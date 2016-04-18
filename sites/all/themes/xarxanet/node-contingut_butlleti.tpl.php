<?php 
  $link = null;
  switch($node->title){
    case 'Ambiental':
      $link = "http://www.xarxanet.org/ambiental/noticies";
      break;
    case 'Comunitari':
      $link = "http://www.xarxanet.org/comunitari/noticies";
      break;
    case 'Cultural':
      $link = "http://www.xarxanet.org/cultural/noticies";
      break;
    case 'Internacional':
      $link = "http://www.xarxanet.org/internacional/noticies";
      break;
    case 'Social':
      $link = "http://www.xarxanet.org/social/noticies";
      break;
    case 'Econòmic':
      $link = "http://www.xarxanet.org/economic/noticies";
      break;
    case 'Formació':
      $link = "http://www.xarxanet.org/formacio/noticies";
      break;
    case 'Informàtic':
      $link = "http://www.xarxanet.org/informatic/noticies";
      break;
    case 'Jurídic':
      $link = "http://www.xarxanet.org/juridic/noticies";
      break;
    case 'Projectes':
      $link = "http://www.xarxanet.org/projectes/noticies";
      break;
  }
?>
<table style="width: 950px; margin-left: auto; margin-right:auto;" cellpadding="0" cellspacing="0">
  <tr>
    <td style="width: 100%; text-align: right;">
      <a style="color: #0D75EB; text-decoration: none; font-size: 12px;" href="<?php print $link;?>"><?php print utf8_encode("+ Veure Totes");?></a>
    </td>
  </tr>
  <tr>
    <?php switch($node->title){
      case 'Ambiental':
        print '<td colspan="1" style="width: 100%; background-color: #518A59; height: 17px; padding-left: 15px; color: white; font-weight: bold;">'.$node->title.'</td>';
        break;
      case 'Comunitari':
        print '<td colspan="1" style="width: 100%; background-color: #604A32; height: 17px; padding-left: 15px; color: white; font-weight: bold;">'.$node->title.'</td>';
        break;
      case 'Cultural':
        print '<td colspan="1" style="width: 100%; background-color: #507471; height: 17px; padding-left: 15px; color: white; font-weight: bold;">'.$node->title.'</td>';
        break;
      case 'Internacional':
        print '<td colspan="1" style="width: 100%; background-color: #555C81; height: 17px; padding-left: 15px; color: white; font-weight: bold;">'.$node->title.'</td>';
        break;
      case 'Social':
        print '<td colspan="1" style="width: 100%; background-color: #756D43; height: 17px; padding-left: 15px; color: white; font-weight: bold;">'.$node->title.'</td>';
        break;
      case 'Econòmic':
        print '<td colspan="1" style="width: 100%; background-color: #6A3F49; height: 17px; padding-left: 15px; color: white; font-weight: bold;">'.$node->title.'</td>';
        break;
      case 'Formació':
        print '<td colspan="1" style="width: 100%; background-color: #746857; height: 17px; padding-left: 15px; color: white; font-weight: bold;">'.$node->title.'</td>';
        break;
      case 'Informàtic':
        print '<td colspan="1" style="width: 100%; background-color: #675175; height: 17px; padding-left: 15px; color: white; font-weight: bold;">'.$node->title.'</td>';
        break;
      case 'Jurídic':
        print '<td colspan="1" style="width: 100%; background-color: #474E5D; height: 17px; padding-left: 15px; color: white; font-weight: bold;">'.$node->title.'</td>';
        break;
      case 'Projectes':
        print '<td colspan="1" style="width: 100%; background-color: #664D4D; height: 17px; padding-left: 15px; color: white; font-weight: bold;">'.$node->title.'</td>';
        break;
    }
    ?>
    <td></td>
  </tr>
  <tr>
    <td colspan="2">
      <?php print $content; ?>
    </td>
  </tr>
</table>