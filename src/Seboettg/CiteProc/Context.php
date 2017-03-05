<?php
/**
 * citeproc-php
 *
 * @link        http://github.com/seboettg/citeproc-php for the source repository
 * @copyright   Copyright (c) 2016 Sebastian Böttger.
 * @license     https://opensource.org/licenses/MIT
 */

namespace Seboettg\CiteProc;
use Seboettg\CiteProc\Data\DataList;
use Seboettg\CiteProc\Locale\Locale;
use Seboettg\CiteProc\Style\Bibliography;
use Seboettg\CiteProc\Style\Citation;
use Seboettg\CiteProc\Style\Macro;
use Seboettg\CiteProc\Style\Sort\Sort;
use Seboettg\CiteProc\Style\Root;
use Seboettg\Collection\ArrayList;


/**
 * Class Context
 * @package Seboettg\CiteProc
 *
 * @author Sebastian Böttger <seboettg@gmail.com>
 */
class Context
{
    /**
     * @var ArrayList
     */
    private $macros;

    /**
     * @var Locale
     */
    private $locale;

    /**
     * @var Bibliography
     */
    private $bibliography;

    /**
     * @var Citation
     */
    private $citation;

    /**
     * @var Sort
     */
    private $sorting;

    /**
     * @var string
     */
    private $mode;

    /**
     * @var DataList
     */
    private $citationItems;

    /**
     * @var ArrayList
     */
    private $results;

    /**
     * @var Root
     */
    private $root;

    /**
     * @var CiteProc
     */
    private $citeProc;

    public function __construct($locale = null)
    {
        if (!empty($locale)) {
            $this->locale = $locale;
        }

        $this->macros = new ArrayList();
        $this->citationItems = new DataList();
        $this->results = new ArrayList();
    }

    public function addMacro($key, $macro)
    {
        $this->macros->add($key, $macro);
    }

    /**
     * @param $key
     * @return Macro
     */
    public function getMacro($key)
    {
        return $this->macros->get($key);
    }

    /**
     * @param Locale $locale
     */
    public function setLocale(Locale $locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return Locale
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @return Bibliography
     */
    public function getBibliography()
    {
        return $this->bibliography;
    }

    /**
     * @param Bibliography $bibliography
     */
    public function setBibliography(Bibliography $bibliography)
    {
        $this->bibliography = $bibliography;
    }

    /**
     * @return Citation
     */
    public function getCitation()
    {
        return $this->citation;
    }

    /**
     * @param Citation $citation
     */
    public function setCitation($citation)
    {
        $this->citation = $citation;
    }

    public function setSorting($sorting)
    {
        $this->sorting = $sorting;
    }

    public function getSorting()
    {
        return $this->sorting;
    }

    /**
     * return the render mode (citation|bibliography)
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param string $mode
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
    }

    /**
     * returns true if the render mode is set to citation
     * @return bool
     */
    public function isModeCitation()
    {
        return $this->mode === "citation";
    }

    /**
     * returns true if the render mode is set to bibliography
     * @return bool
     */
    public function isModeBibliography()
    {
        return $this->mode === "bibliography";
    }

    /**
     * @return DataList
     */
    public function getCitationItems()
    {
        return $this->citationItems;
    }

    /**
     * @param DataList $citationItems
     */
    public function setCitationItems(&$citationItems)
    {
        $this->citationItems = $citationItems;
    }

    public function hasCitationItems()
    {
        return ($this->citationItems->count() > 0);
    }

    /**
     * @return ArrayList
     */
    public function getMacros()
    {
        return $this->macros;
    }

    /**
     * @return ArrayList
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * @return Root
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * @param Root $root
     */
    public function setRoot($root)
    {
        $this->root = $root;
    }

}