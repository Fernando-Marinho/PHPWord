<?php

/**
 * This file is part of PHPWord - A pure PHP library for reading and writing
 * word processing documents.
 *
 * PHPWord is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPWord/contributors.
 *
 * @see         https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2018 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Writer\HTML\Element;

/**
 * ListItemRun element HTML writer
 *
 * @since 0.10.0
 */
class ListItemRun extends TextRun
{
    /**
     * Write ListItem run
     *
     * @return string
     */
    /*
    public function write()
    {
        if (!$this->element instanceof \PhpOffice\PhpWord\Element\ListItemRun) {
            return '';
        }
		$content = '';
        $content .= $this->writeOpening();
        $writer = new Container($this->parentWriter, $this->element);
        $content .= $writer->write();
        $content .= $this->writeClosing();

        return $content;
    }*/
    //ORIGINAL
    /*
    public function write()
    {
        if (!$this->element instanceof \PhpOffice\PhpWord\Element\ListItemRun) {
            return '';
        }

        $writer = new Container($this->parentWriter, $this->element);
        $content = $writer->write() . PHP_EOL;

        return $content;
    }
	
	*/
    /*
	public function __construct() {
		parent::construct();
	}*/
    public function write()
    {
        if (!$this->element instanceof \PhpOffice\PhpWord\Element\ListItemRun) {
            return '';
        }
        $content = '';
        $content .= sprintf('<li data-depth="%s" data-liststyle="%s" data-numId="%s">',  $this->element->getDepth(),
            $this->getListFormat($this->element->getDepth()),$this->getListId());

        $size_content = $this->element->countElements();
        for ($i=0; $i < $size_content; $i++){
            $content .= $this->element->getElement($i)->getText();
        }

        $content .= '</li>';
        $content .= "\n";
        return $content;
    }

    protected function writeOpening()
    {
        $content =  sprintf(
            '<li data-depth="%s" data-liststyle="%s" data-numId="%s">',
            $this->element->getDepth(),
            $this->getListFormat($this->element->getDepth()),
            $this->getListId()
        );
        return $content;
    }
    public function getListFormat($depth)
    {
        return $this->element->getStyle()->getNumStyle();
        /*
        if (isset($this->element->getStyle()->bulletListType[$depth]->format))
       {
           return $this->element->getStyle()->bulletListType[$depth]->format;
       }
       else
       {           
		return 'bullet';
        }*/
    }

    public function getListId()
    {
        return $this->element->getStyle()->getNumId();
    }
    //GITHUB ORIGINAL
    /*
	public function write()
{
if (!$this->element instanceof \PhpOffice\PhpWord\Element\ListItemRun) {
return '';
}
$content = '* ';
$content .= $this->element->getElement(0)->getText();
$content .= '';
return $content;
}
*/
}
