<?php /* Smarty version Smarty-3.1.13, created on 2015-01-06 21:41:13
         compiled from "D:\PROIECTE_PHP\test_smarty\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2291354ac3a59a03d92-61987339%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a96a20928867dfe8f8be6e0a60700cb42894475d' => 
    array (
      0 => 'D:\\PROIECTE_PHP\\test_smarty\\templates\\index.tpl',
      1 => 1420387460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2291354ac3a59a03d92-61987339',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'header' => 0,
    'notification' => 0,
    'meniuSideBar' => 0,
    'footer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_54ac3a59a17619_63166462',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54ac3a59a17619_63166462')) {function content_54ac3a59a17619_63166462($_smarty_tpl) {?><?php echo $_smarty_tpl->tpl_vars['header']->value;?>

<?php if ($_smarty_tpl->tpl_vars['notification']->value!=''){?>
  <?php echo $_smarty_tpl->tpl_vars['notification']->value;?>

<?php }?>

<div class="border">
    <div id="bg"> 
      background
    </div>
    <div class="page">
      <?php echo $_smarty_tpl->tpl_vars['meniuSideBar']->value;?>

      <div class="body">
        <div>
          <h2>Welcome to FineMinds Marketing Solutions</h2>
          <p>
            This website template has been designed by Free Website Templates for you, for free. You can replace all this text with your own text.
          </p>
          <img src="../images/tree.jpg" alt="">
          <div>
            <h3><span>What We Do</span></h3>
            <p>
              This website template has been designed by Free Website Templates for you, for free. You can replace all this text with your own text. You can remove any link to our website from this website template, you're free to use this website template without linking back to us.
            </p>
            <ul>
              <li id="link1">
                <a href="services.html"><span>Design</span></a>
              </li>
              <li id="link2">
                <a href="services.html"><span>Seo</span></a>
              </li>
              <li id="link3">
                <a href="services.html"><span>Copywriting</span></a>
              </li>
            </ul>
          </div>
          <div class="section">
            <h3><span>Latest Projects</span></h3>
            <ul>
              <li>
                <a href="services.html"><img src="../images/template1.jpg" alt=""></a> <span>Project: Web Design</span> <span>Client: Frosty Sweets</span> <a href="services.html">Read Details</a>
              </li>
              <li>
                <a href="services.html"><img src="../images/template2.jpg" alt=""></a> <span>Project: Corporate Identity</span> <span>Client: Puppy Love</span> <a href="services.html">Read Details</a>
              </li>
              <li>
                <a href="services.html"><img src="../images/template3.jpg" alt=""></a> <span>Project: Advertising Campaign</span> <span>Client: Baby School</span> <a href="services.html">Read Details</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php echo $_smarty_tpl->tpl_vars['footer']->value;?>
<?php }} ?>