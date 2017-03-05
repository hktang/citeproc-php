<?php
/**
 * citeproc-php
 *
 * @link        http://github.com/seboettg/citeproc-php for the source repository
 * @copyright   Copyright (c) 2016 Sebastian Böttger.
 * @license     https://opensource.org/licenses/MIT
 */

namespace Seboettg\CiteProc\Style;
use Seboettg\CiteProc\Rendering\Layout;
use Seboettg\CiteProc\Rendering\RenderingInterface;
use Seboettg\CiteProc\Util\Factory;


/**
 * Class Citation
 *
 * The cs:citation element describes the formatting of citations, which consist of one or more references (“cites”) to
 * bibliographic sources. Citations appear in the form of either in-text citations (in the author (e.g. “[Doe]”),
 * author-date (“[Doe 1999]”), label (“[doe99]”) or number (“[1]”) format) or notes. The required cs:layout child
 * element describes what, and how, bibliographic data should be included in the citations (see Layout).
 *
 * @package Seboettg\CiteProc\Node\Style
 *
 * @author Sebastian Böttger <seboettg@gmail.com>
 */
class Citation extends StyleElement
{

    private $node;

    /**
     * Citation constructor.
     * @param \SimpleXMLElement $node
     */
    public function __construct(\SimpleXMLElement $node)
    {
        parent::__construct($node);
        $this->node = $node;
    }

    /**
     * @param array|DataList $data
     * @param int|null $citationNumber
     * @return string
     */
    public function render($data, $citationNumber = null)
    {
        $this->initInheritableNameAttributes($this->node);
        return $this->layout->render($data, $citationNumber);
    }

}