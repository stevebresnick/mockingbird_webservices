<?php
include_once '../variables.php';
?>


<table style="border-radius: 10px 10px 10px 10px; background-color: #fffbd9; width: 95%; padding: 0px 15px 0px 5px; margin-left: auto; margin-right: auto;" class="choicesshadow" border="0" cellpadding="3" align="center">
    <tbody>
        <tr>
            <td><img src="http://coursebuilder.facinghistory.org/cms/app/webroot/img/sessiontiles/sessiontile<?php echo $session['number']; ?>.png" width="110" height="110" /></td>
            <td></td>
            <td>
                <p><span style="font-size: small;"><?php echo $session['intro'];?><br /></span></p>
            </td>
        </tr>
    </tbody>
</table>
<p></p>
<table style="width: 95%;" border="0" cellpadding="10" cellspacing="10" align="center">
    <tbody>
        <tr>
            <td>
                <p style="margin-left: 30px;"><img src="<?php echo $session['scope_and_sequence']['image']; ?>" style="vertical-align: middle; margin: 20px; float: left;" width="211" height="194" /></p>
            </td>
            <td><a href="http://coursebuilder.facinghistory.org/"><span style="font-size: large;">Session <?php echo $session['number'].': '.$session['title'];?></span></a></td>
        </tr>
    </tbody>
</table>