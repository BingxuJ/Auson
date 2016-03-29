<?php
/* 
Description: Code for Table Management Class
 
Copyright 2012 Malcolm Shergold

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

include 'bingmapslib_utils.php';
 
if (!class_exists('BingMapsLibTableClass')) 
{
	if (!defined('BINGMAPSLIB_EVENTS_PER_PAGE'))
		define('BINGMAPSLIB_EVENTS_PER_PAGE', 20);
	
	class BingMapsLibTableClass // Define class
	{
		const HEADERPOSN_TOP = 1;
		const HEADERPOSN_BOTTOM = 2;
		const HEADERPOSN_BOTH = 3;

		const TABLETYPE_HTML = 'html';
		const TABLETYPE_RTF = 'RTF';
		const TABLETYPE_TEXT = 'text';

		const TABLEPARAM_LABEL = 'Label';
		const TABLEPARAM_TAB = 'Tab';
		const TABLEPARAM_ID = 'Id';
		const TABLEPARAM_TYPE = 'Type';
		const TABLEPARAM_ITEMS = 'Items';
		const TABLEPARAM_TEXT = 'Text';
		const TABLEPARAM_LEN = 'Len';
		const TABLEPARAM_SIZE = 'Size';
		const TABLEPARAM_LINK = 'Link';
		const TABLEPARAM_DEFAULT = 'Default';
		const TABLEPARAM_NEXTINLINE = 'Next-Inline';

		const TABLEPARAM_NAME = 'Name';
		const TABLEPARAM_OPTION = 'Option';

		const TABLEPARAM_DIR = 'Dir';
		const TABLEPARAM_EXTN = 'Extn';
		const TABLEPARAM_FUNC = 'Func';
		const TABLEPARAM_ROWS = 'Rows';
		const TABLEPARAM_COLS = 'Cols';
		const TABLEPARAM_DECODE = 'Decode';
		const TABLEPARAM_BEFORE = 'Before';
		const TABLEPARAM_AFTER = 'After';
		
		const TABLEENTRY_ARRAY = 'array';
		const TABLEENTRY_BUTTON = 'button';
		const TABLEENTRY_CHECKBOX = 'checkbox';
		const TABLEENTRY_FUNCTION = 'function';
		const TABLEENTRY_SELECT = 'select';
		const TABLEENTRY_TEXT = 'text';
		const TABLEENTRY_TEXTBOX = 'textbox';
		const TABLEENTRY_VIEW = 'view';
		const TABLEENTRY_VALUE = 'value';
		const TABLEENTRY_COOKIE = 'cookie';
		
		var $tableContents = array();
		var $rowAttr = array();
		var $tableName = '';
		var $tableTags;
		var $divClass;
		var $colId;
		var $rowsPerPage;
		var $columnHeadersId = '';
		var $HeadersPosn;
		
		var $colWidth = array();
		var $colAlign = array();
		var $colClass = array();
		var $columns;
		var $bulkActions;
		var $hideEmptyRows;
		var $spanEmptyCells;
		var $useTHTags;
		var $noAutoComplete;
		var $ignoreEmptyCells;
		
		var $detailsRowsDef;
		var $moreText;
		var $lessText;
		var $hiddenRowsButtonId;
		var $hiddenRowStyle = 'style="display: none;"';
		
		var $currRow;
		var $currCol;
		var $maxCol;
		var $rowActive = array();
		var $currentPage;
		var $totalRows;
		var $firstRowShown;
		var $maxRowsShown;
		
		var $rowCount = 0;
		
		var $scriptsOutput;
		var $moreScriptsOutput;
		
		var $tableType;
		
		function __construct($newTableType = self::TABLETYPE_HTML) //constructor
		{
			if (!isset($this->myDomain) || ($this->myDomain == ''))
				$this->myDomain = basename(dirname(dirname(__FILE__)));
			
			$this->tableType = $newTableType;
			switch ($this->tableType)
			{
				case self::TABLETYPE_HTML:
				case self::TABLETYPE_RTF:
				case self::TABLEENTRY_TEXT:
					break;
					
				default:
					BingMapsLibUtilsClass::ShowCallStack();
					echo "<strong><br>Invalid table type ($newTableType) ".get_class($this)." class<br></strong>\n";
					die;
					break;
			}
			
			$this->currRow = 1;
			$this->currCol = 0;
			$this->maxCol = 0;
			$this->HeaderCols = 0;
			$this->isTabbedOutput = false;
			$this->rowActive[$this->currRow] = false;
			$this->hideEmptyRows = true;
			$this->spanEmptyCells = false;
			$this->divClass = '';
			$this->colId = '';
			$this->divClass = '';
			$this->tableTags = '';
			$this->colId = '';
			$this->totalRows = 0;
			$this->rowsPerPage = 0;
			$this->useTHTags = false;
			$this->noAutoComplete = true;
			$this->ignoreEmptyCells = true;
			$this->scriptsOutput = false;
			$this->moreScriptsOutput = false;
			
			$this->detailsRowsDef = array_merge($this->GetDetailsRowsDefinition(), $this->GetDetailsRowsFooter());
				
			$this->moreText = __('Show', $this->myDomain);
			$this->lessText = __('Hide', $this->myDomain);
			
		}
		
		function SetRowsPerPage($rowsPerPage)
		{
			$this->rowsPerPage = $rowsPerPage;
			
			$this->currentPage = BingMapsLibUtilsClass::GetArrayElement($_REQUEST, 'paged', 1);
			$this->currentPage = BingMapsLibUtilsClass::GetArrayElement($_GET, 'paged', $this->currentPage);
			
			$this->firstRowShown = 1 + (($this->currentPage - 1) * $this->rowsPerPage);
		}

		function AddHiddenRows($result, $hiddenRowsID, $hiddenRows)
		{
			$this->NewRow($result, 'id="'.$hiddenRowsID.'" '.$this->hiddenRowStyle.' class="hiddenRow"');
			$this->AddToTable($result, $hiddenRows);
// TODO ...
			$this->maxCol = max($this->maxCol, $this->HeaderCols);
		}

		function GetMainRowsDefinition()
		{
			BingMapsLibUtilsClass::UndefinedFuncCallError($this, 'GetMainRowsDefinition');
		}
		
		function GetDetailsRowsDefinition()
		{
			return array();
		}
		
		function GetDetailsRowsFooter()
		{
			return array();
		}
		
		function HasHiddenRows()
		{
			// No extended settings
			return (count($this->detailsRowsDef) > 0);
		}
		
		function ExtendedSettingsDBOpts()
		{
			return array();
		}
		
		function NewRow($result, $rowAttr = '')
		{
			// Increment Row ... but only if the current row has data
			if ($this->rowActive[$this->currRow]) 
				$this->currRow++;
				
			$this->currCol = 0;
			$this->rowActive[$this->currRow] = false;
			$this->rowAttr[$this->currRow] = $rowAttr;
		}

		function SetColWidths($newColWidths)
		{
			$this->colWidth = split(',', ','.$newColWidths);
		}

		function SetColAlign($newColAlign)
		{			
			$this->colAlign = split(',', ','.$newColAlign);
		}

		function SetColClass($newColClass)
		{			
			$this->colClass = split(',', ','.$newColClass);
		}

		function SetListHeaders($headerId, $columns = null, $headerPosn = self::HEADERPOSN_BOTH)
		{
			// Save the settings, the headers are actually set by the EnableListHeaders function			
			$this->columnHeadersId = $headerId;

			if ($columns != null)
				$this->columns = $columns;	// Save for possible next call
				
			$this->HeadersPosn = $headerPosn;
			$this->HeaderCols = count($columns);
		}

		function EnableListHeaders()
		{
			if ($this->columnHeadersId === '') return;
			if ($this->columns === null) return;
			
			$columns = $this->columns;	// Use columns from last call
				
			if ($this->showDBIds)
			{
				// Add the ID column
				$columns = array_merge(array('eventID' => 'ID'), $columns); 
			}
				
			if (isset($this->bulkActions))
			{
				// Add the Checkbox column
				$columns = array_merge(array('eventCb' => '<input name="checkall" id="checkall" type="checkbox"  onClick="updateCheckboxes(this)" />'), $columns); 
			}
			
			if ($this->HasHiddenRows() && ($this->hiddenRowsButtonId !== ''))
			{
				$columns = array_merge($columns, array('eventOptions' => $this->hiddenRowsButtonId)); 
			}
				
			// TODO-BEFORE_RELEASE Check that column headers still work OK
			$this->mergedColumns = $columns;
			
			//register_column_headers($this->columnHeadersId, $columns);	
		}
		
		function AddCheckBoxToTable($result, $inputName, $col=0, $value='checked', $checked=false, $label='', $newRow = false)
		{
			$checkedTag = $checked ? ' checked="yes"' : '';
			
			$content = "$label<input name=\"$inputName\" id=\"$inputName\" type=\"checkbox\" value=\"$value\" $checkedTag/>";
			$this->AddToTable($result, $content, $col, $newRow);
		}

		function AddInputToTable($result, $inputName, $maxlength, $value, $col=0, $newRow = false)
		{
			$inputName .= $this->GetRecordID($result);

			$size = $maxlength+1;
			
			$content  = "name=$inputName ";
			$content .= "id=$inputName ";
			$content .= "maxlength=\"$maxlength\" ";
			$content .= "size=\"$size\" ";
			$content .= "value=\"$value\" ";
			
			if ($this->noAutoComplete)
				$content .= "autocomplete=\"off\" "; 
			
			$content = "<input type=text $content />";
			
			$this->AddToTable($result, $content, $col, $newRow);
		}

		function AddSelectToTable($result, $inputName, $options, $value='', $col=0, $newRow = false)
		{
			$inputName .= $this->GetRecordID($result);
			
			$content = "<select name=$inputName>"."\n";
			foreach ($options as $index => $option)
			{
				$selected = ($index == $value) ? ' selected=""' : '';
				$content .= '<option value="'.$index.'"'.$selected.'>'.$option.'&nbsp;&nbsp;</option>'."\n";
			}
			$content .= "</select>"."\n";

			$this->AddToTable($result, $content, $col, $newRow);
		}

		function AddLinkToTable($result, $content, $link, $col=0, $newRow = false)
		{
			$content = '<a href="'.$link.'">'.$content.'</a>';
			$this->AddToTable($result, $content, $col, $newRow);
		}
	
		function AddShowOrHideButtonToTable($result, $tableId, $rowId, $content, $col=0, $newRow = false)
		{
			$this->OutputMoreButtonScript();
			
			$recordID = $this->GetRecordID($result);
			$moreName = 'more'.$recordID;
			
			$content = '<a id="'.$moreName.'" class="button-secondary Xmore-button" onClick="HideOrShowRows(\''.$moreName.'\', \''.$rowId.'\')">'.$content.'</a>';
			$this->AddToTable($result, $content, $col, $newRow);
		}

		function AddToTable($result, $content, $col=0, $newRow = false)
		{
			if ($this->ignoreEmptyCells)
			{
			if (!isset($content) || (strlen($content) == 0)) return;
			}
			
			// Increment Row ... but only if the current row has data
			if ($newRow) 
			{				
				$this->NewRow($result);
			}
			
			if ($col <= 0) 
			{
				$col = ++$this->currCol;
			}
			else
			{
				$this->currCol = $col;
			}
				
			$this->tableContents[$this->currRow][$col] = $content;
			$this->rowActive[$this->currRow] = true;
			$this->maxCol = max($col, $this->maxCol);
		}
		
		function Output_ColHeader()
		{
			$addSeparator = false;
			$tabParam = ' class=mjstab-tab-inactive';
			
			$width = 100/count($this->mergedColumns);
						
			if ($this->isTabbedOutput)
			{
				$separatorWidth = 1;
				$width -= $separatorWidth;
				$tabParam .= " onclick=clickHeader(this)";
				$tabParam .= ' width="'.$width.'%"';
				$tabParam .= ' style="border: 1px solid black;"';
				$separatorParam = ' class=mjstab-tab-gap width="'.$separatorWidth.'%"';
				$separatorParam .= ' style="border-bottom: 1px solid black; background: #f9f9f9;"';				
			}
			
			
			foreach ($this->mergedColumns as $id => $text)
			{
				if ($addSeparator)
				{
					echo "<th $separatorParam></th>\n";					
				}
					
				echo "<th id=$id $tabParam >$text</th>\n";
				
				$addSeparator = $this->isTabbedOutput;
			}
		}
		
		function ColumnHeaders($atTop = true)
		{
			if (!isset($this->columnHeadersId)) 
				return;

			if ($this->columnHeadersId === '') 
				return;

			if ($atTop)
			{
				if ($this->HeadersPosn === self::HEADERPOSN_BOTTOM) 
					return;
					
				echo "<thead>\n";
				echo "<tr>\n";
				$this->Output_ColHeader();
				echo "</tr>\n";
				echo "</thead>\n";
			}
			else
			{
				if ($this->HeadersPosn === self::HEADERPOSN_TOP) 
					return;
					
				echo "<tfoot>\n";
				echo "<tr>\n";
				$this->Output_ColHeader();
				echo "</tr>\n";
				echo "</tfoot>\n";
				echo "<tbody>\n";
			}
		}
		
		function Header()
		{
			switch ($this->tableType)
			{
				case self::TABLETYPE_HTML:
					if ($this->divClass)
						echo "<div class=$this->divClass>\n";
						
					echo "<table ";
					if ($this->tableName !== '')
						echo 'id="'.$this->tableName.'" ';
					echo "$this->tableTags>\n";
					
					echo "<tbody>\n";
					break;
				case self::TABLETYPE_RTF:
				case self::TABLEENTRY_TEXT:
				default:
					break;
			}
			$this->ColumnHeaders();
			$this->ColumnHeaders(false);
		}
		
		function Footer()
		{
			switch ($this->tableType)
			{
				case self::TABLETYPE_HTML:
					echo "</tbody></table>\n";		
					if ($this->divClass)
						echo "</div>\n";		
					break;
				case self::TABLETYPE_RTF:
				case self::TABLEENTRY_TEXT:
				default:
					break;
			}
		}

		function ShowBulkActions( $which = 'top' ) 
		{	
			if (!isset($this->bulkActions)) return '';
			
			$this->OutputCheckboxScript();
			
			$tagNo = $which === 'top' ? '' : '2';
			
			$bulkActions = __('Bulk Actions', $this->myDomain);
			
			$output  = "<div class='alignleft actions'>\n";
			$output .= "<select name='action$tagNo'>\n"; 
			$output .= "<option value='-1' selected='selected'>$bulkActions &nbsp;&nbsp;</option>\n"; 
			foreach ($this->bulkActions as $action => $actionID)
				$output .= "<option value='$action'>$actionID</option>\n"; 
			$output .= "</select>\n"; 
			$output .= "<input type='submit' name='' id='doaction' class='button-secondary action' value=".__('Apply', $this->myDomain)."  />\n"; 
			$output .= "</div>\n"; 
			
			return $output;
		}
		
		function OutputMoreButtonScript()
		{
			if ($this->moreScriptsOutput) return;
			$this->moreScriptsOutput = true;
			
			$moreText = $this->moreText;
			$lessText = $this->lessText;
			
			echo "
<script>

function HideOrShowRows(buttonId, rowId)
{
	var rowObj = document.getElementById(rowId);
	var buttonObj = document.getElementById(buttonId);

	// Toggle display state
	if (rowObj.style.display === '')
	{
		rowObj.style.display = 'none';	
		buttonObj.innerHTML = '$moreText';
		rowsVisible = false;
	}
	else
	{
		rowObj.style.display = '';
		buttonObj.innerHTML = '$lessText';
		rowsVisible = true;	
	}
	
}

</script>
			";
		}
		
		function OutputCheckboxScript()
		{
			if ($this->scriptsOutput) return;
			$this->scriptsOutput = true;
			
			echo "
<script>

function getParentNode(obj, nodeName)
{
	var pobj = obj;
	while (pobj !== null)
	{
		pobj = pobj.parentNode;
		if (pobj === null)
			break;
		pName = pobj.nodeName;
		if (pName === nodeName)
			break;
	}
	
	return pobj;
}

function updateCheckboxes(obj)
{
	var boxid = 'rowSelect[]';
	
	var elem = getParentNode(obj, 'FORM');
	elem = elem.elements;
	
	var newState = obj.checked;				
	for(var i = 0; i < elem.length; i++)
	{
		if (elem[i].name == boxid) 
			elem[i].checked = newState;
		
		if (elem[i].name == obj.name)
			elem[i].checked = newState;
	} 
		
	//var eventtype = event.type;
}

</script>
			";
		}
		
		function ShowPageNavigation( $which = 'top' ) 
		{			
			if ($this->rowsPerPage <= 0) 
				return;
			
			// $which is 'top' or 'bottom'
			$output = '';
			
			if ( $this->totalRows <= $this->rowsPerPage ) 
				return;
				
			$totalPages = (int)(($this->totalRows-1)/$this->rowsPerPage) + 1;
			
			$output .= '<span class="displaying-num">' . sprintf( _n( '1 item', '%s items', $this->totalRows ), number_format_i18n( $this->totalRows ) ) . '</span>';

			$current_url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

			$current_url = remove_query_arg( array( 'hotkeys_highlight_last', 'hotkeys_highlight_first' ), $current_url );

			$page_links = array();

			$disable_first = $disable_last = '';
			if ( $this->currentPage == 1 )
				$disable_first = ' disabled';
			if ( $this->currentPage == $totalPages )
				$disable_last = ' disabled';

			$page_links[] = sprintf( "<a class='%s' title='%s' %s>%s</a>",
				'first-page' . $disable_first,
				$disable_first === '' ? esc_attr__('Go to the first page', $this->myDomain) : '',
				$disable_first === '' ? 'href='.esc_url( remove_query_arg( 'paged', $current_url ) ) : '',
				'&laquo;'
			);

			$page_links[] = sprintf( "<a class='%s' title='%s' %s>%s</a>",
				'prev-page' . $disable_first,
				$disable_first === '' ? esc_attr__('Go to the previous page', $this->myDomain) : '',
				$disable_first === '' ? 'href='.esc_url( add_query_arg( 'paged', max( 1, $this->currentPage-1 ), $current_url ) ) : '',
				'&lsaquo;'
			);

			if ( 'bottom' == $which )
				$html_current_page = $this->currentPage;
			else
				$html_current_page = sprintf( "<input class='current-page' title='%s' type='text' name='%s' value='%s' size='%d' />",
					esc_attr__( 'Current page', $this->myDomain),
					esc_attr( 'paged' ),
					$this->currentPage,
					strlen( $totalPages )
				);

			$html_total_pages = sprintf( "<span class='total-pages'>%s</span>", number_format_i18n( $totalPages ) );
			$page_links[] = '<span class="paging-input">' . sprintf('%1$s '.__('of', $this->myDomain).' %2$s', $html_current_page, $html_total_pages ) . '</span>';

			$page_links[] = sprintf( "<a class='%s' title='%s' %s>%s</a>",
				'next-page' . $disable_last,
				$disable_last === '' ? esc_attr__('Go to the next page', $this->myDomain) : '',
				$disable_last === '' ? 'href='.esc_url( add_query_arg( 'paged', min( $totalPages, $this->currentPage+1 ), $current_url ) ) : '',
				'&rsaquo;'
			);

			$page_links[] = sprintf( "<a class='%s' title='%s' %s>%s</a>",
				'last-page' . $disable_last,
				$disable_last === '' ? esc_attr__('Go to the last page', $this->myDomain) : '',
				$disable_last === '' ? 'href='.esc_url( add_query_arg( 'paged', $totalPages, $current_url ) ) : '',
				'&raquo;'
			);

			$output .= "\n" . join( "\n", $page_links );

			$page_class = $totalPages < 2 ? ' one-page' : '';

			return "<div class='tablenav-pages{$page_class}'>$output</div>";
		}

		function ShowPageControls($which = 'top')
		{
			switch ($this->tableType)
			{
				case self::TABLETYPE_HTML:
					break;
				case self::TABLETYPE_RTF:
				case self::TABLEENTRY_TEXT:
				default:
					return;
			}
						
			$pageControls  = $this->ShowBulkActions($which);
			$pageControls .= $this->ShowPageNavigation($which);
			if ($pageControls != '') 
			{
				echo "<!-- ShowPageControls - START -->\n";
				echo "<div class='tablenav $which actions'>\n$pageControls</div>\n";
				echo "<!-- ShowPageControls - END -->\n";
			}
		}
		
		function Display()
		{
			$colTag = $this->useTHTags ? 'th' : 'td';
			
			$this->ShowPageControls();
			$this->Header();

			for ($row = 1; $row <= $this->currRow; $row++)
			{
				if ($this->hideEmptyRows && !$this->rowActive[$row]) continue;
				switch ($this->tableType)
				{
					case self::TABLETYPE_HTML:
						if (isset($this->rowAttr[$row]) && ($this->rowAttr[$row] != ''))
							echo "<tr ".$this->rowAttr[$row].">\n";
						else
							echo "<tr>\n";
						break;
					case self::TABLETYPE_RTF:
						break;
					case self::TABLEENTRY_TEXT:
					default:
						break;
				}
								
				for ($col = 1; $col <= $this->maxCol; $col++)
				{
					$setWidth = '';
					$setAlign = '';
					$setId = '';
					
					if ($row == 1)
					{
						$setWidth = isset($this->colWidth[$col]) ? ' width="'.$this->colWidth[$col].'"' : '';
						$setAlign = isset($this->colAlign[$col]) ? ' align="'.$this->colAlign[$col].'"' : '';
						$setId = ($this->colId !== '') ? ' id="'.$this->colId.$col.'"' : '';
					}
					
					$setClass = (isset($this->colClass[$col]) && $this->colClass[$col] != '') ? ' class="'.$this->colClass[$col].'"' : '';
					
					$colSpan = '';
					$colSpanCount = 1;
					if ($this->spanEmptyCells)
					{
						for ($nextCol = $col+1; $nextCol <= $this->maxCol; $nextCol++, $colSpanCount++)
						{
							if (isset($this->tableContents[$row][$nextCol])) break;
						}
					}		
										
					if ($colSpanCount > 1)
					{
						$colSpanCount = $this->isTabbedOutput ? (2*($colSpanCount-1))+1 : $colSpanCount;
						$colSpan = ' colspan="'.$colSpanCount.'"';						
					} 
						
					switch ($this->tableType)
					{
						case self::TABLETYPE_HTML:
							echo '<'.$colTag.$colSpan.$setWidth.$setAlign.$setId.$setClass.'>';
							break;
						case self::TABLETYPE_RTF:
							if ($col > 1) echo '\tab ';
						case self::TABLEENTRY_TEXT:
						default:
							break;
					}
					$tableContents = isset($this->tableContents[$row][$col]) ? $this->tableContents[$row][$col] : "";
					$tableContents = trim($tableContents);
					echo (strlen($tableContents) > 0) ? $tableContents : "&nbsp;";
					
					switch ($this->tableType)
					{
						case self::TABLETYPE_HTML:
							echo "</$colTag>\n";
							break;
						case self::TABLETYPE_RTF:
							break;
						case self::TABLEENTRY_TEXT:
						default:
							echo "\t";
							break;
					}
					
					// Skp "Spanned" cells
					$col += ($colSpanCount - 1);
				}			
					
				switch ($this->tableType)
				{
					case self::TABLETYPE_HTML:
						echo "</tr>\n";
						break;
					case self::TABLETYPE_RTF:
						echo '\par '."\n";
						break;
					case self::TABLEENTRY_TEXT:
					default:
						echo "\n";
						break;
				}
			}
			
			$this->Footer();
			$this->ShowPageControls('bottom');
		}
	}
}

if (!class_exists('BingMapsLibAdminListClass')) 
{
	class BingMapsLibAdminListClass extends BingMapsLibTableClass // Define class
	{		
		const VIEWMODE = false;
		const EDITMODE = true;
		
		var $env;
		var $caller;
		var $results;
		var $myPluginObj;
		var $myDBaseObj;
		var $rowNo;
		var $rowCount;
		var $filterRowCounts;
		var $defaultFilterIndex;
		var $showDBIds;
		var $lastCBId;
		var $currResult;
		var $enableFilter;
		
		var $editMode;
		
		var $updateFailed;
		
		function __construct($env, $editMode /* = false */, $newTableType = self::TABLETYPE_HTML) //constructor
		{
			$this->editMode = $editMode;
			
			$this->env = $env;
			
			$this->caller = $env['caller'];
			$this->myPluginObj = $env['PluginObj'];
			$this->myDBaseObj = $env['DBaseObj'];
			$this->myDomain = $env['Domain'];
				
			// Call base constructor
			parent::__construct($newTableType);
			
			$this->ignoreEmptyCells = false;
			
			$this->enableFilter = true;
			
			$callerFolders = explode("/", plugin_basename($this->caller));
			$this->pluginName = $callerFolders[0];

			$this->tableTags = 'class="widefat" cellspacing="0"';
			
			if (isset($this->myDBaseObj->adminOptions['PageLength']))
				$this->SetRowsPerPage($this->myDBaseObj->adminOptions['PageLength']);
			else
				$this->SetRowsPerPage(BINGMAPSLIB_EVENTS_PER_PAGE);
				
			$this->useTHTags = true;
			$this->showDBIds = $this->myDBaseObj->getOption('Dev_ShowDBIds');					
			$this->lastCBId = '';
			
			$this->defaultFilterIndex = 0;	
			$this->updateFailed = false;
			
			$this->columnDefs = $this->GetMainRowsDefinition();			
			
			if (!isset($this->HeadersPosn)) $this->HeadersPosn = self::HEADERPOSN_BOTH;
			if (!isset($this->hiddenRowsButtonId)) 
			{
				if (!$this->editMode)
					$this->hiddenRowsButtonId = __('Details', $env['Domain']);		
				else
				{
					$this->hiddenRowStyle = '';
					$this->hiddenRowsButtonId = '';
					$this->moreText = '';
				}
			}
		}
		
		function NewRow($result, $rowAttr = '')
		{
			BingMapsLibTableClass::NewRow($result, $rowAttr);
			
			$col=1;
			
			$recordID = $this->GetRecordID($result);
			$isFirstLine = ($this->lastCBId !== $recordID);
			$this->lastCBId = $recordID;
			
			if (isset($this->bulkActions))
			{
				//echo "Adding Checkbox - Col = $col<br>";				
				if ($isFirstLine)
					$this->AddCheckBoxToTable($result, 'rowSelect[]', $col++, $recordID);
				else	
					$this->AddToTable($result, ' ', $col++);
			}
			
			if ($this->showDBIds)
			{
				if ($isFirstLine)
					$this->AddToTable($result, $recordID, $col++);
				else	
					$this->AddToTable($result, ' ', $col++);
			}
		}
		
		function GetTableID($result)
		{
			BingMapsLibUtilsClass::UndefinedFuncCallError($this, 'GetTableID');
		}
		
		function GetRecordID($result)
		{
			BingMapsLibUtilsClass::UndefinedFuncCallError($this, 'GetRecordID');
		}
		
		function GetRowClass($result)
		{
			return '';
		}
		
		function IsRowInView($result, $rowFilter)
		{
			return true;
		}
		
		function ShowRow($result, $rowFilter)
		{
			$rtnVal = true;

			if (!$this->enableFilter) 
				return $rtnVal;
			
			if ($this->rowNo < $this->firstRowShown) 
			{				
				$rtnVal = false;
			}	
			else if (($this->rowCount >= $this->rowsPerPage) && ($this->rowsPerPage > 0))
			{
				$rtnVal = false;
			}
				
			return $rtnVal;
		}

		function OutputFilterLinks($results, $rowFilter = '')
		{
			$current_url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
			$current_url = remove_query_arg( 'filter', $current_url);
			$current_url = remove_query_arg( 'paged', $current_url);
				
			// Loop through all entries to get row counts for each filter
			$filter_links = '';
			foreach ($this->filterRowCounts as $filterId => $filterCount)
			{
				$rowCount = 0;
					
				foreach($results as $result)
				{
					if ($this->IsRowInView($result, $filterId))
						$rowCount++;
				}						
				$this->filterRowCounts[$filterId] = $rowCount;
								
				if ($filter_links != '')
					$filter_links .= ', ';

				$filterClass = strtolower($filterId);
				
				$filterClass = ($rowFilter == $filterId) ? 'selected' : strtolower($filterId);
				$filterURL = esc_url( add_query_arg( 'filter', $filterId, $current_url ) );
						
				$filter_links .= sprintf( "<a class='%s' title='%s' %s>%s</a>",
					$filterClass,
					$rowCount > 0 ? esc_attr__('Show all Events', $this->myDomain) : '',
					$rowCount > 0 ? 'href='.$filterURL : '',
					"$filterId ($rowCount)"
				);
			}
				
			echo "<div class=filter-links>\n";
			echo $filter_links;					
			echo "</div>\n";
		}
		
		function GetSelectOptsArray($settingOption)
		{
			if (isset($settingOption[BingMapsLibTableClass::TABLEPARAM_DIR]))
			{
				// Folder is defined ... create the search path
				$dir = $settingOption[BingMapsLibTableClass::TABLEPARAM_DIR];
				if (substr($dir, strlen($dir)-1, 1) != '/')
					$dir .= '/';
				if (isset($settingOption[BingMapsLibTableClass::TABLEPARAM_EXTN]))
					$dir .= '*.'.$settingOption[BingMapsLibTableClass::TABLEPARAM_EXTN];
				else
					$dir .= '*.*';

				// Now get the files list and convert paths to file names
				$selectOpts = glob($dir);
				foreach ($selectOpts as $key => $path)
					$selectOpts[$key] = basename($path);
			}
			else
				$selectOpts = $settingOption[BingMapsLibTableClass::TABLEPARAM_ITEMS];
					
			$selectOptsArray = array();
			
			foreach ($selectOpts as $selectOpt)
			{
				$selectAttrs = explode('|', $selectOpt);
				if (count($selectAttrs) == 1)
				{
					$selectOptValue = $selectOptText = $selectAttrs[0];
				}
				else
				{
					$selectOptValue = $selectAttrs[0];
					$selectOptText = __($selectAttrs[1], $this->myDomain);
				}
				
				$selectOptsArray[$selectOptValue] = $selectOptText;
			}
			
			return $selectOptsArray;
		}
		
		function GetHTMLTag($settingOption, $controlValue, $editMode = true)
		{
			$autocompleteTag = ' autocomplete="off"';
			$controlName = $settingOption[self::TABLEPARAM_ID];
			
			$editControl = '';
			
			$settingType = $settingOption[self::TABLEPARAM_TYPE];
			
			if (!$editMode)
			{
				switch ($settingType)
				{
					case self::TABLEENTRY_TEXT:
					case self::TABLEENTRY_TEXTBOX:
					case self::TABLEENTRY_SELECT:
					case self::TABLEENTRY_CHECKBOX:
					case self::TABLEENTRY_COOKIE:
						$settingType = self::TABLEENTRY_VIEW;
						break;						
				}
			}
				
			switch ($settingType)
			{
				case self::TABLEENTRY_TEXT:
				case self::TABLEENTRY_COOKIE:
					$editLen = $settingOption[self::TABLEPARAM_LEN];
					$editSize = isset($settingOption[self::TABLEPARAM_SIZE]) ? $settingOption[self::TABLEPARAM_SIZE] : $editLen+1;
					$editControl = '<input type="text"'.$autocompleteTag.' maxlength="'.$editLen.'" size="'.$editSize.'" name="'.$controlName.'" value="'.$controlValue.'" />'."\n";
					break;

				case self::TABLEENTRY_TEXTBOX:
					$editRows = $settingOption[self::TABLEPARAM_ROWS];
					$editCols = $settingOption[self::TABLEPARAM_COLS];
					$editControl = '<textarea rows="'.$editRows.'" cols="'.$editCols.'" name="'.$controlName.'">'.$controlValue."</textarea>\n";
					break;

				case self::TABLEENTRY_SELECT:
					$editControl  = '<select name="'.$controlName.'">'."\n";
					$selectOptsArray = self::GetSelectOptsArray($settingOption);
					foreach ($selectOptsArray as $selectOptValue => $selectOptText)
					{
						$selected = ($controlValue == $selectOptValue) ? ' selected=""' : '';
						$editControl .= '<option value="'.$selectOptValue.'"'.$selected.' >'.$selectOptText."&nbsp;</option>\n";
					}
					$editControl .= '</select>'."\n";
					break;

				case self::TABLEENTRY_CHECKBOX:
					$checked = ($controlValue === true) ? 'checked="yes"' : '';
					$cbText = __($settingOption[BingMapsLibTableClass::TABLEPARAM_TEXT], $this->myDomain);
					$editControl = '<input type="checkbox" name="'.$controlName.'" id="'.$controlName.'" value="1" '.$checked.' />&nbsp;'.$cbText."\n";
					break;

				case self::TABLEENTRY_VIEW:
					$editControl = $controlValue;
					break;

				case self::TABLEENTRY_VALUE:
					$editControl = $settingOption['Value'];
					break;

				default:
					//echo "<string>Unrecognised Table Entry Type - $settingType </string><br>\n";
					//BingMapsLibUtilsClass::ShowCallStack();
					break;
			}

			return $editControl;
		}
		
		function AddResultFromTable($result)
		{		
			$canDisplayTable = true;
			
			// Check if this row CAN be output using data from the columnDefs table
			foreach ($this->columnDefs as $key => $columnDef)
			{
				if (!isset($columnDef[self::TABLEPARAM_TYPE]))
					return true;
				
				switch ($columnDef[self::TABLEPARAM_TYPE])
				{
					//case self::TABLEENTRY_CHECKBOX:
					case self::TABLEENTRY_TEXT:
					//case self::TABLEENTRY_TEXTBOX:
					case self::TABLEENTRY_SELECT:
					case self::TABLEENTRY_VALUE:
					case self::TABLEENTRY_VIEW:
					case self::TABLEENTRY_COOKIE:
						break;
						
					default:
						$canDisplayTable = false;
echo "Can't display this table - Label:".$columnDef[self::TABLEPARAM_LABEL]." Id:".$columnDef[self::TABLEPARAM_ID]." Column Type:".$columnDef[self::TABLEPARAM_TYPE]."<br>\n";						
						break 2;
				}
			}
			
			if ($canDisplayTable)
			{
				$rowClass = $this->GetRowClass($result);
				$rowAttr = ($rowClass != '') ? 'class="'.$rowClass.'"' : '';
				$this->NewRow($result, $rowAttr);
				
				foreach ($this->columnDefs as $columnDef)
				{
					$columnId = $columnDef[self::TABLEPARAM_ID];
					
					if ($this->updateFailed)
					{
						// Error updating values - Get value(s) from form controls
						$recId = $this->GetRecordID($result);
						$currVal = stripslashes($_POST[$columnId.$recId]);
					}
					else
					{
						// Get value(s) from database
						$currVal = $result->$columnId;
					}

					if (isset($columnDef[BingMapsLibTableClass::TABLEPARAM_DECODE]))
					{
						$funcName = $columnDef[BingMapsLibTableClass::TABLEPARAM_DECODE];
						$currVal = $this->$funcName($result);
					}
					
					if ($this->editMode)
						$columnType = $columnDef[self::TABLEPARAM_TYPE];
					else
						$columnType = self::TABLEENTRY_VIEW;
						
					switch ($columnType)
					{
						//case self::TABLEENTRY_CHECKBOX:
						//case self::TABLEENTRY_TEXTBOX:
						
						case self::TABLEENTRY_SELECT:
							if (isset($columnDef[self::TABLEPARAM_ITEMS]))
								$options = $columnDef[self::TABLEPARAM_ITEMS];
							else
							{
								$functionId = $columnDef[self::TABLEPARAM_FUNC];
								$options = $this->$functionId($result);
							}
							
							$this->AddSelectToTable($result, $columnId, $options, $currVal);
							break;
						
						case self::TABLEENTRY_COOKIE:
							$cookieID = $columnDef[self::TABLEPARAM_ID];
							if (isset($_COOKIE[$cookieID]))
								$currVal = $_COOKIE[$cookieID];
							else
								$currVal = '';
							// Fall into next case ...
							
						case self::TABLEENTRY_TEXT:
							if (!isset($columnDef[self::TABLEPARAM_LEN]))
							{
								echo "No Len entry in Column Definition<br>\n";
								BingMapsLibUtilsClass::print_r($columnDef, 'columnDef');
							}
							
							$this->AddInputToTable($result, $columnId, $columnDef[self::TABLEPARAM_LEN], $currVal);
							break;

						case self::TABLEENTRY_VALUE:
						case self::TABLEENTRY_VIEW:
							$recId = $this->GetRecordID($result);
							$hiddenTag = '<input type="hidden" name="'.$columnId.$recId.'" value="'.$currVal.'"/>';
							if (isset($columnDef[BingMapsLibTableClass::TABLEPARAM_LINK]))
							{
								$currValLink = $columnDef[BingMapsLibTableClass::TABLEPARAM_LINK];
								if (isset($columnDef['LinkTo']))
								{
									$currValLink .= "http://";		// Make link absolute
									$currValLink .= $result->$columnDef['LinkTo'];
									$target = 'target="_blank"';
								}
								else
								{
									$currValLink .= $recId;
									$currValLink = ( function_exists('wp_nonce_url') ) ? wp_nonce_url($currValLink, plugin_basename($this->caller)) : $currValLink;
									$target = '';
								}
								$currVal = '<a href="'.$currValLink.'" '.$target.'>'.$currVal.'</a>';
							}
							$this->AddToTable($result, $currVal.$hiddenTag);
							break;
							
						default:
							break;
					}
				}
			}
						
			return $canDisplayTable;
		}
		
		function AddOptions($result, $optionDetails = array())
		{
			$hiddenRowsID = 'record'.$this->GetRecordID($result).'options';
			
			if (count($this->detailsRowsDef) > 0)
			{
				$colClassList = '';
				for ($c=1; $c<$this->maxCol; $c++)
					$colClassList .= ',';
				
				if ($this->moreText != '')
				{
					$this->AddShowOrHideButtonToTable($result, $this->tableName, $hiddenRowsID, $this->moreText);
					$colClassList .= 'optionsCol';					
				}
				else if ($this->maxCol > 0)
				{
					$this->AddToTable($result, '');
				}
				
				$this->SetColClass($colClassList);
												
				$tableId = $this->GetTableID($result);
				$hiddenRowsColId = $tableId.'-hiddenCol';
		
				$tabbedRowCounts = array();
				
				$nextInline = false;
				$hiddenRows = "<table class=$tableId-table width=\"100%\">\n";
				foreach ($this->detailsRowsDef as $option)
				{
					if (isset($option[self::TABLEPARAM_LABEL]))
						$optionLabel = __($option[self::TABLEPARAM_LABEL], $this->myDomain);
						
					if (!$nextInline && isset($option[self::TABLEPARAM_TAB]))
					{
						$tabId = $option[self::TABLEPARAM_TAB];
						$rowNumber = isset($tabbedRowCounts[$tabId]) ? $tabbedRowCounts[$tabId] + 1 : 1;
						$tabbedRowCounts[$tabId] = $rowNumber;
						
						$tabRowId = 'id='.$tabId.'-row'.$rowNumber;
					}
					else
						$tabRowId = '';
						
					$tableRowTag = '<tr '.$tabRowId.' >';
					switch ($option[self::TABLEPARAM_TYPE])
					{
						case self::TABLEENTRY_FUNCTION:
							$functionId = $option[self::TABLEPARAM_FUNC];
							$content = $this->$functionId($result, $optionDetails);
							$hiddenRows .= $tableRowTag."\n";
							$colSpan = ' class='.$hiddenRowsColId.'2';
							if (isset($option[self::TABLEPARAM_LABEL]))
								$hiddenRows .= '<td class='.$hiddenRowsColId.'1>'.$optionLabel."</td>\n";
							else
								$colSpan = " colspan=2";
								
							$hiddenRows .= '<td'.$colSpan.'>'.$content."</td>\n";
							$hiddenRows .= "</tr>\n";
							break;
							
						case self::TABLEENTRY_ARRAY:
							if (isset($option[self::TABLEPARAM_LABEL]))
							{
								$hiddenRows .= $tableRowTag."\n";
								$hiddenRows .= '<td colspan=2>'.$optionLabel."</td>\n";
								$hiddenRows .= "</tr>\n";
							}
							$arrayId = $option[self::TABLEPARAM_ID];
							foreach ($result->$arrayId as $elemId => $elemValue)
							{
								$hiddenRows .= $tableRowTag."\n";
								$hiddenRows .= '<td class='.$hiddenRowsColId.'1>'.$elemId."</td>\n";
								$hiddenRows .= '<td class='.$hiddenRowsColId.'2>'.$elemValue."</td>\n";
								$hiddenRows .= "</tr>\n";
							}
							break;
							
						default:
							$optionId = $option[self::TABLEPARAM_ID];
							$option[self::TABLEPARAM_ID] = $option[self::TABLEPARAM_ID].$this->GetRecordID($result);
											
							if (!$nextInline)
								$hiddenRows .= $tableRowTag."\n";
							if (strlen($option[self::TABLEPARAM_LABEL]) > 0)
							{
								if (!$nextInline)
									$hiddenRows .= '<td class='.$hiddenRowsColId.'1>';
								$hiddenRows .= $optionLabel."</td>\n";
								$nextInline = false;
							}
							if (!$nextInline)
								$hiddenRows .= '<td class='.$hiddenRowsColId.'2>';
							
							if (isset($option[self::TABLEPARAM_TYPE]) && ($option[self::TABLEPARAM_TYPE] != self::TABLEENTRY_COOKIE))
							{
								if (isset($result->$optionId))
									$currVal = $result->$optionId;
								else if (isset($option[self::TABLEPARAM_DEFAULT]))
									$currVal = $option[self::TABLEPARAM_DEFAULT];
								else
									$currVal = '';
							}
							else if (isset($_COOKIE[$optionId]))
								$currVal = $_COOKIE[$optionId];
							else
								$currVal = '';
								
							$hiddenRows .= self::GetHTMLTag($option, $currVal, $this->editMode);
							
							$nextInline = isset($option[self::TABLEPARAM_NEXTINLINE]);
							if (!$nextInline) 
								$hiddenRows .= "</td>\n</tr>\n";
							break;
					}
				}
				$hiddenRows .= "</table>\n";
				
				$this->spanEmptyCells = true;
				$this->AddHiddenRows($result, $hiddenRowsID, $hiddenRows);					
			}			
		}
				
		static function GetSettingsRowIndex($arr1, $id)
		{			
			for ($index=0; $index<count($arr1); $index++)
			{
				if ($arr1[$index][self::TABLEPARAM_ID] === $id)
					return $index;
			}
			
			return -1;
		}
		
		static function MergeSettings($arr1, $arr2)
		{
			// Merge Arrays ... keeping all duplicate entries
			$vals1 = $arr1;
			foreach ($arr2 as $val2)
			{
				$index = -1;
				if (isset($val2[self::TABLEPARAM_BEFORE]))
				{
					// This entry must be positioned within earlier entries
					$index = self::GetSettingsRowIndex($vals1, $val2[self::TABLEPARAM_BEFORE]);
				}
				if (isset($val2[self::TABLEPARAM_AFTER]))
				{
					// This entry must be positioned within earlier entries
					$index = self::GetSettingsRowIndex($vals1, $val2[self::TABLEPARAM_AFTER]);
					if ($index >= 0) $index++;
				}
				
				if ($index >= 0)
					array_splice($vals1, $index, 0, array($val2));
				else
					$vals1 = array_merge($vals1, array($val2));
			}
			return $vals1;
		}
		
		function GetListDetails($result)
		{
			return array();
		}
		
		function OutputJavascript($selectedTabIndex = 0)
		{
			if (!$this->isTabbedOutput)
				return;
					
			if (count($this->columnDefs) <= 1)
				return;
						
			$javascript = $this->JS_Top();
			foreach ($this->columnDefs as $column)
			{
				$setingsPageID = $column[self::TABLEPARAM_ID];
				$javascript .= $this->JS_Tab($setingsPageID);					
			}
				
			$javascript .= $this->JS_Bottom($selectedTabIndex);
			echo $javascript;
		}

		function OutputList($results)
		{
			if (count($results) == 0) return;
			
			$tableId = $this->GetTableID($results[0]);
			
			$this->OutputJavascript();
			
			$headerColumns = array();
			foreach ($this->columnDefs as $column)
			{
				$columnLabel = __($column[self::TABLEPARAM_LABEL], $this->myDomain);
				$headerColumns = array_merge($headerColumns, array($column[self::TABLEPARAM_ID] => $columnLabel));
			}
			$this->SetListHeaders($tableId, $headerColumns, $this->HeadersPosn);
			
			$this->results = $results;
			
			$this->EnableListHeaders();
			
			if (isset($this->filterRowCounts))
			{
				$filterKeys = array_keys($this->filterRowCounts);
				$defaultFilter = $filterKeys[$this->defaultFilterIndex];
				
				// Get the filter requested in the HTTP request 
				$rowFilter = isset($_GET['filter']) ? $_GET['filter'] : $defaultFilter;
				
				// Check that the selected filter is defined ... or use default
				$rowFilter = isset($this->filterRowCounts[$rowFilter]) ? $rowFilter : $defaultFilter;
						
				// Calculate and output filter links
				$this->OutputFilterLinks($results, $rowFilter);
				
				// Get the row count for the selected filter
				$this->totalRows = isset($this->filterRowCounts[$rowFilter]) ? $this->filterRowCounts[$rowFilter] : 0;
			}
			else
			{
				$this->totalRows = count($results);
				$rowFilter = '';
			}
										
			$this->rowNo = 0;
			$this->rowCount = 0;
			
			if (count($results) > 0)
				$this->tableName = $this->GetTableID($results[0]);			
	
			foreach($results as $result)
			{
				if (!$this->IsRowInView($result, $rowFilter))
					continue;
				
				$this->rowNo++;
				
				if (!$this->ShowRow($result, $rowFilter))
					continue;
				
				if (!$this->AddResultFromTable($result))
				{
					if (!isset($this->usedAddResult))
					{
						$this->usedAddResult = true;
						echo "<br>Error returned by AddResultFromTable function in ".get_class($this)." class<br>\n";
						BingMapsLibUtilsClass::ShowCallStack();
					}
				}
				$resultDetails = $this->GetListDetails($result);
				$this->AddOptions($result, $resultDetails);
				$this->rowCount++;
			}
			
			$this->Display();
		}
		
		function JS_Top()
		{
			return "
<script language='JavaScript'>
<!-- Hide script from old browsers
// End of Hide script from old browsers -->

var tabIdsList  = [";
	
		}
		
		function JS_Tab($tabID)
		{
			return "'$tabID',";	
		}
		
		function JS_Bottom($defaultTab)
		{
			return "''];

function onSettingsLoad()
{
	var defaultTabId = GetURLParam('tab');
	if (defaultTabId != '')
	{		
		defaultTabId = defaultTabId.replace(/_/g,'-');
		defaultTabId = defaultTabId.toLowerCase()
		defaultTabId = defaultTabId + '-tab';
	}
	else
	{
		defaultTabId = tabIdsList[".$defaultTab."];
	}
	
	SelectTab(defaultTabId);
}

window.onload = onSettingsLoad;

function clickHeader(obj)
{
	SelectTab(obj.id);
}

function GetURLParam(paramID)
{
	var rtnVal = '';
	
	var Url = location.href;
	Url.match(/\?(.+)$/);
 	var Params = RegExp.$1;
 	
	Variables = Params.split ('&');
	for (i = 0; i < Variables.length; i++) 
	{
		Separ = Variables[i].split('=');
		if (Separ[0] == paramID)
		{
			rtnVal = Separ[1];
			break;
		}
	}
	
	return rtnVal;
}

function SelectTab(selectedTabID)
{
	for (index = 0; index < tabIdsList.length-1; index++)
	{
		tabId = tabIdsList[index];
		ShowOrHideTab(tabId, selectedTabID);
	}
}

function ShowOrHideTab(tabID, selectedTabID)
{
	var headerElem, tabElem, pageElem, tabWidth;
	
	// Get the header 'Tab' Element					
	tabElem = document.getElementById(tabID);
	
	// Get the Body Element					
	pageElem = document.getElementById('recordoptions');

	// Get all <tr> entries for this TabID and hide/show them as required
	for (i=1; i<100; i++)
	{
		// Get the Body Element	
		rowElemID = tabID +'-row' + i;				
		rowElem = document.getElementById(rowElemID);
		if (rowElem == null) 
			break;
			
		if (tabID == selectedTabID)
		{
			// Show the settings row
			rowElem.style.display = '';
		}
		else
		{
			// Hide the settings row
			rowElem.style.display = 'none';
		}
	}
	
	if (tabID == selectedTabID)
	{
		// Make the font weight normal and background Grey
		tabElem.style.fontWeight = 'bold';	
		tabElem.style.borderBottom = '0px red solid';
		//tabElem.style.backgroundColor = '#F9F9F9';
	}
	else
	{
		// Make the font weight normal and background Grey
		tabElem.style.fontWeight = 'normal';	
		tabElem.style.borderBottom = '1px black solid';		
		//tabElem.style.backgroundColor = '#F1F1F1';
	}	
}

</script>
			";
		}
	}
}
		 

if (!class_exists('Template_For_ClassDerivedFrom_BingMapsLibAdminListClass')) 
{
	class Template_For_ClassDerivedFrom_BingMapsLibAdminListClass extends BingMapsLibAdminListClass // Define class
	{		
		function __construct($env) //constructor
		{
		}
		
		function GetRecordID($result)
		{
		}
		
		function IsRowInView($result, $rowFilter)
		{
		}

		function ShowRow($result, $rowFilter)
		{
		}
		
	}
}

?>