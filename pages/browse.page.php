<?php
	require 'pages/header.tpl.php';
?>
<div id="rightside">
      <div id="content">
        <div class="corners">
          <div class="tl"></div>
          <div class="tr"></div>

        </div>
        <div id="innercontent" style="min-height: 311px;">
          <div class="pane" id="pane0" style="">
<table width="750" cellpadding="0" style="margin: 5px 7px 0" class="dboverview">
  <tbody>
    <tr>
      <td><div style="margin-bottom: 15px">
          <table class="browsenav">
            <tbody>
              <tr>
                <td class="options">Select:&nbsp;&nbsp;<a onclick="checkAll()">All</a>&nbsp;&nbsp;<a onclick="checkNone()">None</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;With selected:&nbsp;&nbsp;<a onclick="emptySelectedTables()">Empty</a>&nbsp;&nbsp;<a onclick="dropSelectedTables()">Drop</a>&nbsp;&nbsp;<a onclick="optimizeSelectedTables()">Optimize</a></td>
              </tr>
            </tbody>
          </table>
		<?php
 			$cmd = execute_redis_command('keys','*');
			if(count($cmd) == 0) {
				echo 'No Keys Found';
			} else {
		?>
          <div class="grid">
            <div class="emptyvoid">&nbsp;</div>
            <div class="gridheader impotent">
              <div class="gridheaderinner">
                <table cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td><div class="headertitle column1" column="1">Table</div></td>
                      <td><div class="columnresizer"></div></td>
                      <td><div class="headertitle column2" column="2">Rows</div></td>
                      <td><div class="columnresizer"></div></td>
                      <td><div class="headertitle column3" column="3">Charset</div></td>
                      <td><div class="columnresizer"></div></td>
                      <td><div class="headertitle column4" column="4">Overhead</div></td>
                      <td><div class="columnresizer"></div></td>
                      <td><div style="border-right: 0" class="emptyvoid">&nbsp;</div></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div style="overflow-x: hidden; max-height: 400px" class="gridscroll withchecks">
			<?php
				foreach($cmd as $data) {
			?>
			<div class="row41 browse alternator">
                <table cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td><div class="item column1">
                          <div style="float: left; overflow: hidden; width: 185px"><?php echo $data; ?></div>
                      <img onclick="subTabLoad('aa_cms', 'sym_sections_association')" class="goto" src="images/goto.png"></div></td>
                      <td><div class="item column2"><?php echo execute_redis_command('type',$data); ?></div></td>
                      <td><div class="item column3">expires in</div></td>
                      <td><div class="item column4"></div></td>
                    </tr>
                  </tbody>
                </table>
              </div>
			<?php	
				}
			?>
              <div class="row41 browse alternator">
                <table cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td><div class="item column1">
                          <div style="float: left; overflow: hidden; width: 185px">sym_sections_association</div>
                      <img onclick="subTabLoad('aa_cms', 'sym_sections_association')" class="goto" src="images/goto.png"></div></td>
                      <td><div class="item column2">3</div></td>
                      <td><div class="item column3">utf8</div></td>
                      <td><div class="item column4"></div></td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
          </div>
          <?php
      }
          ?>
			<br>
          <div style="display: none; margin-bottom: 15px" class="errormessage" id="reporterror"></div>
          <div class="inputbox">
            <h4>Add new value</h4>
            <form onsubmit="createTable(); return false">
              <table cellpadding="0" style="width: 300px">
                <tbody>
                  <tr>
                    <td style="width: 80px" class="secondaryheader"> Name: </td>
                    <td><input type="text" style="width: 150px" id="TABLENAME" class="text"></td>
                  </tr>
                  <tr>
                    <td colspan="2" style="padding-top: 5px; color: gray"> Setup the fields for the table below: </td>
                  </tr>
                </tbody>
              </table>
              <div id="fieldlist">
                <div class="fieldbox">
                  <table cellpadding="0" class="overview">
                    <tbody>
                      <tr>
                        <td class="fieldheader" colspan="4"><span class="fieldheadertitle">&lt;New field&gt;</span> <a onclick="removeField(this)" class="fieldclose"></a></td>
                      </tr>
                      <tr>
                        <td class="secondaryheader"> Name: </td>
                        <td><input type="text" onkeyup="updateFieldName(this)" name="NAME" class="text"></td>
                        <td style="padding-left: 5px" class="secondaryheader"> Type: </td>
                        <td><select onchange="updateFieldName(this); toggleValuesLine(this)" name="TYPE">
                            <option value="timestamp">timestamp</option>
                            <option value="set">set</option>
                          </select></td>
                      </tr>
                      <tr style="display: none" class="valueline">
                        <td class="secondaryheader"> Values: </td>
                        <td class="inputarea"><input type="text" onkeyup="updateFieldName(this)" name="VALUES" class="text"></td>
                        <td style="color: gray" colspan="2"> Enter in the format: ('1','2') </td>
                      </tr>
                      <tr>
                        <td class="secondaryheader"> Size: </td>
                        <td class="inputarea"><input type="text" onkeyup="updateFieldName(this)" name="SIZE" class="text"></td>
                        <td style="padding-left: 5px" class="secondaryheader"> Key: </td>
                        <td class="inputarea"><select onchange="updateFieldName(this)" name="KEY">
                            <option value=""></option>
                            <option value="primary">primary</option>
                            <option value="unique">unique</option>
                            <option value="index">index</option>
                          </select></td>
                      </tr>
                      <tr>
                        <td class="secondaryheader"> Default: </td>
                        <td class="inputarea"><input type="text" onkeyup="updateFieldName(this)" name="DEFAULT" class="text"></td>
                        <td style="padding-left: 5px" class="secondaryheader">Charset:</td>
                        <td class="inputarea"><select onchange="updateFieldName(this)" name="CHARSET">
                            <option value="eucjpms">eucjpms</option>
                        </select></td>
                      </tr>
                      <tr>
                        <td class="secondaryheader"> Other: </td>
                        <td colspan="3"><label>
                            <input type="checkbox" onchange="updateFieldName(this)" name="UNSIGN">
                            Unsigned</label>
                          <label>
                          <label>
                            <input type="checkbox" onchange="updateFieldName(this)" name="AUTO">
                            Auto Increment</label></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <table width="370" cellpadding="0" id="fieldcontrols">
                <tbody>
                  <tr>
                    <td style="padding: 5px 0 4px"><input type="submit" value="Submit" class="inputbutton"></td>
                    <td valign="top" align="right" style="padding: 0px 4px 0"><a style="font-size: 11px !important" onclick="addTableField()">Add field</a>
                      <div style="visibility: hidden; height: 0">
                        <input type="submit">
                    </div></td>
                  </tr>
                </tbody>
              </table>
            </form>
          </div>
        </div></td>
    </tr>
  </tbody>
</table>
          </div>
        </div>
        <div class="corners">
          <div class="bl"></div>
          <div class="br"></div>
        </div>
      </div>
    </div>