<?php
/**
 * PHP version 5
 *
 * @package    generalDriver
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     Tristan Lins <tristan.lins@bit3.de>
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  The MetaModels team.
 * @license    LGPL.
 * @filesource
 */

namespace ContaoCommunityAlliance\DcGeneral\Contao\View\Contao2BackendView;

use ContaoCommunityAlliance\DcGeneral\Data\ModelId;

/**
 * The class IdSerializer provides handy methods to serialize and un-serialize model ids including the data provider
 * name into a string.
 *
 * @deprecated This class gonna be replaced by the ModelId. Use this instead!
 *
 * @package DcGeneral\Contao\View\Contao2BackendView
 *
 * @see \ContaoCommunityAlliance\DcGeneral\Data\ModelId
 * @see \ContaoCommunityAlliance\DcGeneral\Data\ModelIdInterface
 */
class IdSerializer extends ModelId
{
    /**
     * Construct.
     *
     * @param string $dataProviderName The data provider name.
     *
     * @param mixed  $modelId          The model id.
     */
    public function __construct($dataProviderName = '', $modelId = '')
    {
        $this->modelId          = $modelId;
        $this->dataProviderName = $dataProviderName;
    }

    /**
     * Set the data provider name.
     *
     * @param string $dataProviderName The name.
     *
     * @return IdSerializer
     */
    public function setDataProviderName($dataProviderName)
    {
        $this->dataProviderName = $dataProviderName;

        return $this;
    }

    /**
     * Set the model Id.
     *
     * @param mixed $modelId The id.
     *
     * @return IdSerializer
     */
    public function setId($modelId)
    {
        $this->modelId = $modelId;

        return $this;
    }

    /**
     * Determine if both, data provider name and id are set and non empty.
     *
     * @return bool
     */
    public function isValid()
    {
        return !(empty($this->modelId) || empty($this->dataProviderName));
    }
}
