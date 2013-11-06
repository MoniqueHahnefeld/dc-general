<?php

namespace DcGeneral\Contao\Dca\Populator;

use AbstractEventDrivenEnvironmentPopulator;
use DcGeneral\Clipboard\DefaultClipboard;
use DcGeneral\Contao\InputProvider;
use DcGeneral\Contao\TranslationManager;
use DcGeneral\Controller\DefaultController;
use DcGeneral\DataDefinition\Section\BasicSectionInterface;
use DcGeneral\EnvironmentInterface;
use DcGeneral\Exception\DcGeneralInvalidArgumentException;
use DcGeneral\View\BackendView\ListView;
use DcGeneral\View\BackendView\ParentView;
use DcGeneral\View\BackendView\TreeView;
use DcGeneral\View\BackendView;

/**
 * Class HardCodedPopulator
 *
 * This class only exists to have some intermediate hardcoded transition point until the builder ans populators have been
 * properly coded. This class will then be removed from the code base.
 *
 * @package DcGeneral\Contao\Dca\Populator
 */
class HardCodedPopulator extends AbstractEventDrivenEnvironmentPopulator
{
	const PRIORITY = 1000;

	/**
	 * Create a view instance in the environment if none has been defined yet.
	 *
	 * @param EnvironmentInterface $environment
	 *
	 * @throws \DcGeneral\Exception\DcGeneralInvalidArgumentException
	 * @internal
	 */
	protected function populateView(EnvironmentInterface $environment)
	{
		// Already populated, get out then.
		if ($environment->getView())
		{
			return;
		}

		$definition = $environment->getDataDefinition();

		// We need to extract the view information from the basic section.
		if (!$definition->hasBasicSection())
		{
			return;
		}

		$section = $definition->getBasicSection();

		switch ($section->getMode())
		{
			case BasicSectionInterface::MODE_FLAT:
				$view = new ListView();
				break;
			case BasicSectionInterface::MODE_PARENTEDLIST:
				$view = new ParentView();
				break;
			case BasicSectionInterface::MODE_HIERARCHICAL:
				$view = new TreeView();
				break;
			default:
				throw new DcGeneralInvalidArgumentException('Unknown view mode encountered: ' . $section->getMode());
		}
		$view->setEnvironment($environment);
		$environment->setView($view);
	}

	/**
	 * Create a controller instance in the environment if none has been defined yet.
	 *
	 * @param EnvironmentInterface $environment
	 * @internal
	 */
	public function populateController(EnvironmentInterface $environment)
	{
		// Already populated, get out then.
		if ($environment->getController())
		{
			return;
		}

		$controller = new DefaultController();

		$controller->setEnvironment($environment);
		$environment->setController($controller);
	}

	/**
	 * {@inheritDoc}
	 */
	public function populate(EnvironmentInterface $environment)
	{
		if (!$environment->getInputProvider())
		{
			$environment->setInputProvider(new InputProvider());
		}

		if (!$environment->getClipboard())
		{
			$environment->setClipboard(new DefaultClipboard());
		}

		if (!$environment->getTranslationManager())
		{
			$environment->setTranslationManager(new TranslationManager());
		}

		$this->populateView($environment);
		$this->populateController($environment);
	}
}