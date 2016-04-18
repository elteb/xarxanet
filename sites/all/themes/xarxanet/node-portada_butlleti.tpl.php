<div style="font-size: 4px; font-family: Verdana;">
<table style="width: 900px; margin-left: auto; margin-right: auto;" cellspacing="15px" cellpadding="0">
  <tr>
    <td colspan=2 style="width: 100%; text-align: center; font-size: 10px;">
      <strong><?php print 'Si no veieu bé aquest butlleti, entreu aquí: '; ?><a style="color: #0D75EB; text-decoration: none; font-weight: bold;" href="<?php print url($node->path,array('absolute' => TRUE)); ?>"><?php print "Butlletí de xarxanet.org - Online"; ?></a></strong>
    </td>
  </tr>
  <tr>
    <td colspan=2 style="width: 100%;">
      <a style="outline: none; -moz-outline-style: none;" href="http://www.xarxanet.org"><img style="border: none;" src="http://www.xarxanet.org/sites/all/themes/xarxanet/img/hdr_but_950.jpg"/></a>
      <table cellspacing="0" cellpadding="0" style="height: 28px; background-color: #C2C2C2; width: 100%;">
        <tr>
          <td style="margin: 0px; padding-left: 0px; font-size: 12px; height: 14px; width: 34%;">
            <ul style="padding: 0px; margin: 0px;">
              <li style="display: inline; list-style-image: none; padding: 0px 5px; border-right: 1px solid #0D75EB;font-family:Verdana"><a style="color: #0D75EB; text-decoration: none; font-weight: bold;" href="http://www.xarxanet.org/noticies"><?php print 'Notícies'; ?></a></li>
              <li style="display: inline; list-style-image: none; padding: 0px 5px; border-right: 1px solid #0D75EB;font-family:Verdana"><a style="color: #0D75EB; text-decoration: none; font-weight: bold;" href="http://www.xarxanet.org/agenda"><?php print 'Agenda'; ?></a></li>
              <li style="display: inline; list-style-image: none; padding: 0px 5px; border-right: 1px solid #0D75EB;font-family:Verdana"><a style="color: #0D75EB; text-decoration: none; font-weight: bold;" href="http://www.xarxanet.org/recursos"><?php print 'Recursos'; ?></a></li>
              <li style="display: inline; list-style-image: none; padding: 0px 5px; border-right: 1px solid #0D75EB;font-family:Verdana"><a style="color: #0D75EB; text-decoration: none; font-weight: bold;" href="http://www.xarxanet.org/financaments"><?php print 'Finançaments'; ?></a></li>
              <li style="display: inline; list-style-image: none; padding: 0px 5px; border-right: 1px solid #0D75EB;font-family:Verdana"><a style="color: #0D75EB; text-decoration: none; font-weight: bold;" href="http://bloc.xarxanet.org/"><?php print 'Opinió'; ?></a></li>
              <li style="display: inline; list-style-image: none; padding: 0px 5px; border-right: 1px solid #0D75EB;font-family:Verdana"><a style="color: #0D75EB; text-decoration: none; font-weight: bold;" href="http://www.xarxanet.org/noticies/publica-continguts-xarxanetorg"><?php print 'Publica continguts'; ?></a></li>
              <li style="display: inline; list-style-image: none; padding: 0px 5px; color: #0D75EB; font-weight: bold;font-family:Verdana"><a style="color: #0D75EB; text-decoration: none; font-weight: bold;" href="http://www.xarxanet.org/segueix-nos"><?php print 'Segueix-nos'; ?></a></li>
            </ul>
          </td>
          <td style="width: 5%;">
            <a style="outline: none; -moz-outline-style: none;" href="http://www.facebook.com/xarxanet"><img style="border: none;"  src="http://www.xarxanet.org/sites/all/themes/xarxanet/img/btn_facebook.gif"/></a>
            <a style="outline: none; -moz-outline-style: none;" href="http://twitter.com/xarxanetorg"><img style="border: none;" src="http://www.xarxanet.org/sites/all/themes/xarxanet/img/btn_twitter.gif"/></a>
          </td>
          <td style="font-size: 11px; width: 15%; text-align: center;font-family:Verdana">
            <?php print 'Butlletí setmanal de xarxanet.org'; ?><br/>
            <?php print $data_butlleti." <div style=\"font-size: 10px; display: inline;\"> <strong>núm. ".$num_butlleti; ?></strong></div>
          </td>
      </table>
    </td>
  </tr>
  <tr>
    <td style="width: 65%;" valign="top">
      <table style="width: 100%;" cellspacing="0px" cellpadding="0">
        <tr>
          <td>
            <table cellspacing="0" cellpadding="0">
              <tr>
                <td colspan=1 >
                  <div style="width: 200px; padding-left: 15px; border: 1px solid #C2C2C2; background-color: #C2C2C2; font-size: 14px; font-weight: bold; font-family:Verdana">
                    <?php print 'Destaquem'; ?>
                  </div>
                </td>
              </tr>
              <tr>
                <td colspan=2 style="border: 1px solid #C2C2C2; width: 100%; height: 100%">
                  <div style="padding: 15px; font-size: 12px; font-family:Verdana;">
                    <h3><a style="color: #0D75EB; text-decoration: none;" href="<?php print $link_noticia_destacada;?>"><?php print $titol_noticia_destacada; ?></a></h3>
                    <div style="text-align: center;"><img src="<?php print $foto_noticia_destacada; ?>" alt=""/></div>
                    <p><?php print $resum_noticia_destacada; ?></p>
                  </div>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td>
            <table cellspacing="0" cellpadding="0" style="margin-top:15px;">
              <tr>
                <td colspan=1 >
                  <div style="width: 200px; padding-left: 15px; border: 1px solid #C2C2C2; background-color: #C2C2C2; font-size: 14px; font-weight: bold; font-family:Verdana">
                    <?php print 'Recull de Notícies'; ?>
                  </div>
                </td>
                <td>
                  <div style="text-align: right"><a href="http://www.xarxanet.org/noticies" style="color: #0D75EB; text-decoration: none; font-size: 10px; font-family:Verdana"><?php print "+ Veure totes"; ?></a></div>
                </td>
              </tr>
              <tr>
                <td style="border: 1px solid #C2C2C2; width: 100%; height: 100%" colspan=2>
                  <table cellspacing="15px" cellpadding="0" style="font-size: 12px; font-family:Verdana">
                    <tr>
                      <td style="width: 50%; border: 1px solid #C2C2C2; padding: 15px;" valign="top">
                        <table style="font-size: 12px;">
                          <tr>
                            <td valign="top">
                              <img src="<?php print $foto_recull_noticia1; ?>" alt=""/>
                            </td>
                            <td valign="top">
                              <h4><a style="color: #0D75EB; text-decoration: none; font-family:Verdana" href="<?php print $link_recull_noticia1;?>"><?php print $titol_recull_noticia1; ?></a></h4>
                            </td>
                          </tr>
                          <tr>
                            <td colspan=2>
                                 <?php print $resum_recull_noticia1; ?>
                            </td>
                          </tr>
                        </table>
                      </td>
                      <td style="border: 1px solid #C2C2C2; padding: 15px;" valign="top">
                        <table style="font-size: 12px;">
                          <tr>
                            <td valign="top">
                              <img src="<?php print $foto_recull_noticia2; ?>" alt=""/>
                            </td>
                            <td valign="top">
                              <h4><a style="color: #0D75EB; text-decoration: none;" href="<?php print $link_recull_noticia2;?>"><?php print $titol_recull_noticia2; ?></a></h4>
                            </td>
                          </tr>
                          <tr>
                            <td colspan=2>
                                 <?php print $resum_recull_noticia2; ?>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td style="border: 1px solid #C2C2C2; padding: 15px;" valign="top">
                        <table style="font-size: 12px;">
                          <tr>
                            <td valign="top">
                              <img src="<?php print $foto_recull_noticia3; ?>" alt=""/>
                            </td>
                            <td valign="top">
                              <h4><a style="color: #0D75EB; text-decoration: none;" href="<?php print $link_recull_noticia3;?>"><?php print $titol_recull_noticia3; ?></a></h4>
                            </td>
                          </tr>
                          <tr>
                            <td colspan=2>
                                 <?php print $resum_recull_noticia3; ?>
                            </td>
                          </tr>
                        </table>
                     </td>
                      <td style="border: 1px solid #C2C2C2; padding: 15px;" valign="top">
                        <table style="font-size: 12px;">
                          <tr>
                            <td valign="top">
                              <img src="<?php print $foto_recull_noticia4; ?>" alt=""/>
                            </td>
                            <td valign="top">
                              <h4><a style="color: #0D75EB; text-decoration: none;" href="<?php print $link_recull_noticia4;?>"><?php print $titol_recull_noticia4; ?></a></h4>
                            </td>
                          </tr>
                          <tr>
                            <td colspan=2>
                                 <?php print $resum_recull_noticia4; ?>
                            </td>
                          </tr>
                        </table>
                     </td>
                    </tr>
                  </table>
                </td> 
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
    <td style="width: 30%;" valign="top">
      <table cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <table style="width: 100%;" cellspacing="0" cellpadding="0">
              <tr>  
                <td>
                  <div style="width: 200px; padding-left: 15px; border: 1px solid #C2C2C2; background-color: #C2C2C2; font-size: 14px; font-weight: bold; font-family:Verdana">
                    <?php print 'Finançaments'; ?>
                  </div>
                </td>
                <td>
                  <div style="text-align: right"><a href="http://www.xarxanet.org/financaments" style="color: #0D75EB; text-decoration: none; font-size: 10px; font-family:Verdana"><?php print "+ Veure tots"; ?></a></div>
                </td>
              </tr>
              <tr>
                <td colspan=2 style="border: 1px solid #C2C2C2; width: 100%; font-size: 12px;  height: 100%; padding: 15px; font-family:Verdana">
                  <?php
                    $view = views_get_view('butlleti_financaments');
                    print $view->preview('defaults');
                  ?>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td>
            <table cellspacing="0" cellpadding="0" style="margin-top:15px; font-size: 12px; font-family:Verdana">
              <tr>
                <td>
                  <div style="width: 200px; padding-left: 15px; border: 1px solid #C2C2C2; background-color: #C2C2C2; font-size: 14px; font-weight: bold; font-family:Verdana">
                    <?php print 'Recursos'; ?>
                  </div>
                </td>
                <td>
                  <div style="text-align: right"><a href="http://www.xarxanet.org/recursos" style="color: #0D75EB; text-decoration: none; font-size: 10px; font-family:Verdana"><?php print "+ Veure tots"; ?></a></div>
                </td>
              </tr>
              <tr>
                <td colspan=2 style="width: 100%; padding: 15px; border: 1px solid #C2C2C2;">
                  <h3><a style="color: #0D75EB; text-decoration: none; font-family:Verdana" href="<?php print $link_recurs_destacat;?>"><?php print $titol_recurs_destacat; ?></a></h3>
                  <div style="text-align: center;"><a style="outline: none; -moz-outline-style: none;" href="<?php print $link_recurs_destacat; ?>"><img style="border: none;" src="<?php print $foto_recurs_destacat; ?>" alt=""/></a></div>
                  <p><?php print $resum_recurs_destacat; ?></p>
                </td>
              </tr>
              <tr>
                <td colspan=2 style="width: 100%; padding: 15px; border: 1px solid #C2C2C2;">
                  <table style="font-size: 12px; font-family:Verdana">
                    <tr>
                      <td valign="top">
                        <img src="<?php print $foto_recurs_destacat2; ?>" alt=""/>
                      </td>
                      <td valign="top">
                        <h4><a style="color: #0D75EB; text-decoration: none; font-family:Verdana" href="<?php print $link_recurs_destacat2;?>"><?php print $titol_recurs_destacat2; ?></a></h4>
                      </td>
                    </tr>
                    <tr>
                      <td colspan=2>
                           <?php print $resum_recurs_destacat2; ?>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td colspan=1 style="width: 65%;" valign="top">
      <table style="width: 100%" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan=1 >
            <div style="width: 200px; padding-left: 15px; border: 1px solid #C2C2C2; background-color: #C2C2C2; font-size: 14px; font-weight: bold; font-family:Verdana">
              <?php print 'Propers Esdeveniments'; ?>
            </div>
          </td>
          <td>
            <div style="text-align: right"><a href="http://www.xarxanet.org/agenda" style="color: #0D75EB; text-decoration: none; font-size: 10px; font-family:Verdana"><?php print "+ Veure tots"; ?></a></div>
          </td>
        </tr>
        <tr>
          <td colspan=2 style="border: 1px solid #C2C2C2;">
            <table cellspacing="15px">
              <tr>
                <td style="width: 50%" valign="top">
                  <table style="width: 100%; font-size: 12px;" cellspacing="0" cellpadding="0">
                    <tr>
                      <td>
                        <div style="width: 200px; padding-left: 15px; border: 1px solid black; background-color: black; color: white; font-size: 14px; font-weight: bold; font-family:Verdana">
                          <?php print 'Cursos'; ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 100%; padding: 15px; border: 1px solid #C2C2C2; font-family:Verdana">
                        <?php
                          $view = views_get_view('propers_cursos');
                          print $view->preview('page_1');
                        ?>    
                      </td>
                    </tr>
                  </table>
                </td>
                <td valign="top">
                  <table style="width: 100%; font-size: 12px; font-family:Verdana" cellspacing="0" cellpadding="0">
                    <tr>
                      <td>
                        <div style="width: 200px; padding-left: 15px; border: 1px solid black; background-color: black; color: white; font-size: 14px; font-weight: bold; font-family:Verdana">
                          <?php print 'Actes'; ?>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="width: 100%; padding: 15px; border: 1px solid #C2C2C2; font-family:Verdana">
                        <?php
                          $view = views_get_view('propers_cursos');
                          print $view->preview('page_2');
                        ?>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
    <td colspan=1 style="width: 30%;" valign="top">
      <table style="width: 100%; font-size: 12px; font-family:Verdana" cellspacing="0" cellpadding="0">
      <?php if(!empty($links_bloc)): ?>
        <tr>
          <td colspan=2 >
            <div style="width: 200px; padding-left: 15px; border: 1px solid #C2C2C2; background-color: #C2C2C2; font-size: 14px; font-weight: bold; font-family:Verdana">
              <?php print 'Opinió'; ?>
            </div>
          </td>
          <td></td>
        </tr>
        <tr>
          <td colspan=2 style="border: 1px solid #C2C2C2; padding: 15px;">
            <table style="font-size: 12px; font-family:Verdana">
              <tr>
                <td>
                  <?php print 'Últims articles d\'opinió al bloc de xarxanet.org'; ?>
                </td>
              </tr>
              <tr>
                <td>
                  <?php foreach($links_bloc as $link_bloc): ?>
                    <div style="height: 25px; padding-top: 7px;" ><img src="http://www.xarxanet.org/sites/all/themes/xarxanet/img/blog-logo.png" /><?php print str_replace("<a","<a style=\"text-decoration: none; position: relative; top: -12px; color: #0D75EB;\"",$link_bloc['view']); ?></div>
                  <?php endforeach; ?>
                 
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <?php endif; ?>
      </table>   
    </td>
  </tr>
</table>
</div>