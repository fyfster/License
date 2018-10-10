<?php /* Smarty version Smarty-3.1.13, created on 2015-03-30 21:51:35
         compiled from "D:\Facultate\Proiect\Licenta\templates\meniuSideBar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1448355199b37c8bc73-80333374%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da64d091a839443440f3f4a27d1e9a2d48dca349' => 
    array (
      0 => 'D:\\Facultate\\Proiect\\Licenta\\templates\\meniuSideBar.tpl',
      1 => 1420530214,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1448355199b37c8bc73-80333374',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'isLoggedIn' => 0,
    'userLoggedIn' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55199b37caef06_12022222',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55199b37caef06_12022222')) {function content_55199b37caef06_12022222($_smarty_tpl) {?><div class="sidebar">
  <a href="index.php" id="logo"><img src="../images/logo.png" alt="logo"></a>
  <ul class="sidebar-nav">
    <li class="selected">
      <a href="index.php">Acasa</a>
    </li>
    <li>
      <a href="about.html">Despre</a>
    </li>
    <li>
      <a href="services.html">Servicii</a>
    </li>
    <?php if ($_smarty_tpl->tpl_vars['isLoggedIn']->value==true){?>
      <li class="accordion-group">
            <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseHr">Resurse Umane</a>
            </div>
            <div id="collapseHr" class="accordion-body collapse" style="height: 0px; ">
                <div class="accordion-inner">
                    <ul>
                        <li class="accordion-group">
                          <div class="accordion-heading-Drop">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseConf">Configurari</a>
                    </div>
                           <div id="collapseConf" class="accordion-body collapse" style="height: 0px; ">
                        <div class="accordion-inner">
                                  <ul>
                                    <li class="accordion-heading-Child">
                        <a href="configurari/LocPrescriereCM.php">Loc Prescriere CM</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Tip Concediu CM</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Departament</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Mod Pontaj</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Conditii Munca</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Casa Sanatate</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Incadrare</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Grila Salariu</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Contract</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Banca</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Motiv Lichidare</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Tip Venit</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Mod Salarizare</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Impozit</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Sarbatori Legale</a>
                      </li>
                      </ul>
                    </div>
                  </div>
                        </li>
                        <li class="accordion-group">
                          <div class="accordion-heading-Drop">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapsePontaje">Pontaje</a>
                    </div>
                    <div id="collapsePontaje" class="accordion-body collapse" style="height: 0px; ">
                        <div class="accordion-inner">
                                  <ul>
                                    <li class="accordion-heading-Child">
                        <a href="#">Pontaje</a>
                      </li>
                     </ul>
                    </div>
                  </div>
                  </li>
                  <li class="accordion-group">
                          <div class="accordion-heading-Drop">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseSalarii">Salarii</a>
                    </div>
                     <div id="collapseSalarii" class="accordion-body collapse" style="height: 0px; ">
                        <div class="accordion-inner">
                                  <ul>
                                    <li class="accordion-heading-Child">
                        <a href="#">Salarii</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Parametrii Generali</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Parametrii Firma</a>
                      </li>
                      </ul>
                    </div>
                  </div>
                    
                  </li>
                  <li class="accordion-group">
                          <div class="accordion-heading-Drop">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseContracte">Contracte</a>
                    </div>
                    <div id="collapseContracte" class="accordion-body collapse" style="height: 0px; ">
                        <div class="accordion-inner">
                                  <ul>
                                    <li class="accordion-heading-Child">
                        <a href="#">Angajati Activi</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Angajati Inactivi</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Personal lichidat in luna</a>
                      </li>
                        <li class="accordion-heading-Child">
                        <a href="#">Personal angajat in luna</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Modificare CNP</a>
                      </li>
                      </ul>
                    </div>
                  </div>
                  </li>
                  <li class="accordion-group">
                          <div class="accordion-heading-Drop">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseCalcul">Calcul</a>
                    </div>
                    <div id="collapseCalcul" class="accordion-body collapse" style="height: 0px; ">
                        <div class="accordion-inner">
                                  <ul>
                                    <li class="accordion-heading-Child">
                        <a href="#">Trecere la luna</a>
                      </li>
                        <li class="accordion-heading-Child">
                        <a href="#">Calcul salarii</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Deschidere/Inchidere luna</a>
                      </li>
                      </ul>
                    </div>
                  </div>
                  </li>
                  <li class="accordion-group">
                          <div class="accordion-heading-Drop">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseListe">Liste</a>
                    </div>
                    <div id="collapseListe" class="accordion-body collapse" style="height: 0px; ">
                        <div class="accordion-inner">
                                  <ul>
                                    <li class="accordion-heading-Child">
                        <a href="#">Fluturas Salarii</a>
                      </li>
                        <li class="accordion-heading-Child">
                        <a href="#">Stat de plata Salarii</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Stat de plata avans</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Centralizator Salarii</a>
                      </li>
                        <li class="accordion-heading-Child">
                        <a href="#">Expirari contracte temporare</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Situatii Concedii de odihna</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Situatia Tichetelor de masa</a>
                      </li>
                      </ul>
                    </div>
                  </div>
                  </li>
                   <li class="accordion-group">
                          <div class="accordion-heading-Drop">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseDeclaratii">Declaratii</a>
                    </div>
                    <div id="collapseDeclaratii" class="accordion-body collapse" style="height: 0px; ">
                        <div class="accordion-inner">
                                  <ul>
                                    <li class="accordion-heading-Child">
                        <a href="#">Declaratia 205</a>
                      </li>
                        <li class="accordion-heading-Child">
                        <a href="#">Declaratia 112</a>
                      </li>
                      <li class="accordion-heading-Child">
                        <a href="#">Validare declaratii</a>
                      </li>
                      </ul>
                    </div>
                  </div>
                  </li>
                  <li class="accordion-group">
                          <div class="accordion-heading-Drop">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapseCM">Concediu Medical</a>
                    </div>
                    <div id="collapseCM" class="accordion-body collapse" style="height: 0px; ">
                        <div class="accordion-inner">
                                  <ul>
                                    <li class="accordion-heading-Child">
                        <a href="#">Concediu Medical</a>
                      </li>
                        <li class="accordion-heading-Child">
                        <a href="#">Transmitere CM in Salarii</a>
                      </li>
                      </ul>
                    </div>
                  </div>
                  </li>
                    </ul>                 
                </div>
             </div>
        </li>
    <?php }?>
    <li>
      <a href="portfolio.html">Portfoliu</a>
    </li>
    <li>
      <a href="contact.html">Contact</a>
    </li>
    <li>
      <a href="blog.html">Blog</a>
    </li>
  </ul>
  <?php if ($_smarty_tpl->tpl_vars['isLoggedIn']->value!=true){?>
  <form action="index.php?action=login" method="POST">
    <span>Utilizator:</span><input type="text" name="user" />
    <span>Parola:</span><input type="password" name="pass" />
    <br />
    <div align="center">
    <input type="submit" id="submit" value="Login">
    </div>
  </form>
  
  <p><a href="new_user.php">Inregistreaza!</a></p>
  <?php }else{ ?>
    <form action="index.php?action=logout" method="POST">
      <span><?php echo $_smarty_tpl->tpl_vars['userLoggedIn']->value;?>
</span> 
    <div align="center">
      <input type="submit" id="submit" value="Logout">
      </div>
      </form>
  
  <?php }?>
  
  <p>
    Copyright 2014
  </p>
  <p>
    MoonLight
  </p>
</div>
<?php }} ?>