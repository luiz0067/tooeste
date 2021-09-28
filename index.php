<?php 
require($_SERVER['DOCUMENT_ROOT'].'/route.php');
require($_SERVER['DOCUMENT_ROOT'].'/library/functions.php');

Route::add('/',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/site/template.php');
});


Route::add('/admin',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/index.php');
});

Route::add('/admin/',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/index.php');
});

Route::add('/admin/panel',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/panel.php');
});

Route::add('/admin/login',function(){
	include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/login.php');
},'get');

Route::add('/admin/login',function(){
	include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/login.php');
},'post');

Route::add('/admin/logout',function(){
	logout();
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/login.php');
},"post");

Route::add('/admin/logout',function(){
	logout();
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/login.php');
},"get");

Route::add('/admin/esqueceu_a_senha',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/esqueceu_a_senha.php');
},"get");

Route::add('/admin/esqueceu_a_senha',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/esqueceu_a_senha.php');
},"post");

Route::add('/admin/recuperar_senha',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/recuperar_senha.php');
},"get");

Route::add('/admin/recuperar_senha',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/recuperar_senha.php');
},"post");

Route::add('/admin/email_recuperar_senha',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/email_recuperar_senha.php');
});


Route::add('/admin/time_session',function(){
    echo sessionCount();
},'get');

Route::add('/admin/apps/explorer',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/apps/explorer.html');
},'get');

Route::add('/admin/explorer',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/controller/explorer.php');
},'get');

Route::add('/admin/explorer',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/controller/explorer.php');
},'post');
//###############################################################################




//###############################################################################
Route::add('/admin/usuarios',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/system/cadastro_usuarios.php');
},'get');

Route::add('/admin/menus',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/system/cadastro_menus.php');
},'get');

Route::add('/admin/noticias',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/system/cadastro_noticias.php');
},'get');

Route::add('/admin/noticiasAnexo',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/system/cadastro_noticiasAnexo.php');
},'get');

Route::add('/admin/tiposAnuncios',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/system/cadastro_tiposAnuncios.php');
},'get');

Route::add('/admin/anuncios',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/system/cadastro_anuncios.php');
},'get');

Route::add('/admin/albumFotos',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/system/cadastro_albumFotos.php');
},'get');

Route::add('/admin/fotos',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/system/cadastro_fotos.php');
},'get');

Route::add('/admin/albumVideos',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/system/cadastro_albumVideos.php');
},'get');

Route::add('/admin/videos',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/system/cadastro_videos.php');
},'get');
//###############################################################################



//###############################################################################
require_once($_SERVER['DOCUMENT_ROOT'].'/mvc/controller/controllerMenus.php');
Route::add('/server/site/mainMenus',function(){
   ((new controllerMenus())->findMainMenus());
},'get');

Route::add('/server/site/subMenus/([0-9]*)',function($idMenu){
   ((new controllerMenus())->findSubMenus($idMenu));
},'get');

Route::add('/server/menus',function(){
   if(controlAcess())((new controllerMenus())->find());
},'get');

Route::add('/server/menus/([0-9]*)',function($id){
   if(controlAcess())((new controllerMenus())->findById($id));
},'get');

Route::add('/server/menus',function(){
    if(controlAcess())((new controllerMenus())->save());
},'put');

Route::add('/server/menus',function(){
    if(controlAcess())((new controllerMenus())->del());
},'delete');
//###############################################################################


//###############################################################################
require_once($_SERVER['DOCUMENT_ROOT'].'/mvc/controller/controllerAlbumFotos.php');
Route::add('/server/site/slideShowPhotos/',function(){
   ((new controllerAlbumFotos())->findSlideShow($menuSubMenu=''));
},'get');

Route::add('/server/site/slideShowPhotos/(.*)/',function($menuSubMenu){
   ((new controllerAlbumFotos())->findSlideShow($menuSubMenu));
},'get');

Route::add('/server/site/slideShowPhotos/(.*)/(.*)/',function($menuSubMenu){
   ((new controllerAlbumFotos())->findSlideShow($menuSubMenu));
},'get');

Route::add('/server/site/slideShowPhotos/(.*)/(.*)/(.*)/',function($menuSubMenu){
   ((new controllerAlbumFotos())->findSlideShow($menuSubMenu));
},'get');

Route::add('/server/site/photos/(.*)/',function($menuSubMenu){
   ((new controllerAlbumFotos())->findMenuAlbum($menuSubMenu));
},'get');

Route::add('/server/albumFotos',function(){
   if(controlAcess())((new controllerAlbumFotos())->find());
},'get');

Route::add('/server/albumFotos/([0-9]*)',function($id){
   if(controlAcess())((new controllerAlbumFotos())->findById($id));
},'get');


Route::add('/server/albumFotos',function(){
    if(controlAcess())((new controllerAlbumFotos())->save());
},'put');

Route::add('/server/albumFotos',function(){
    if(controlAcess())((new controllerAlbumFotos())->del());
},'delete');
//###############################################################################


//###############################################################################
require_once($_SERVER['DOCUMENT_ROOT'].'/mvc/controller/controllerFotos.php');

Route::add('/server/fotos',function(){
    if(controlAcess())((new controllerFotos())->find());
},'get');

Route::add('/server/fotos/([0-9]*)',function($id){
   if(controlAcess())((new controllerFotos())->findById($id));
},'get');

Route::add('/server/fotos',function(){
    if(controlAcess())((new controllerFotos())->save());
},'post');

Route::add('/server/fotos',function(){
    if(controlAcess())((new controllerFotos())->del());
},'delete');
//###############################################################################


//###############################################################################
require($_SERVER['DOCUMENT_ROOT'].'/mvc/controller/controllerAlbumVideos.php');
Route::add('/server/site/slideShowVideos/',function(){
   ((new controllerAlbumVideos())->findSlideShow($menuSubMenu=''));
},'get');

Route::add('/server/site/slideShowVideos/(.*)/',function($menuSubMenu){
   ((new controllerAlbumVideos())->findSlideShow($menuSubMenu));
},'get');

Route::add('/server/site/slideShowVideos/(.*)/(.*)/',function($menuSubMenu){
   ((new controllerAlbumVideos())->findSlideShow($menuSubMenu));
},'get');

Route::add('/server/site/slideShowVideos/(.*)/(.*)/(.*)/',function($menuSubMenu){
   ((new controllerAlbumVideos())->findSlideShow($menuSubMenu));
},'get');

Route::add('/server/site/videos/(.*)/',function($menuSubMenu){
   ((new controllerAlbumVideos())->findMenuAlbum($menuSubMenu));
},'get');

Route::add('/server/albumVideos',function(){
   if(controlAcess())((new controllerAlbumVideos())->find());
},'get');

Route::add('/server/albumVideos/([0-9]*)',function($id){
   if(controlAcess())((new controllerAlbumVideos())->findById($id));
},'get');

Route::add('/server/albumVideos',function(){
    if(controlAcess())((new controllerAlbumVideos())->save());
},'put');

Route::add('/server/albumVideos',function(){
    if(controlAcess())((new controllerAlbumVideos())->del());
},'delete');
//###############################################################################

//###############################################################################
require($_SERVER['DOCUMENT_ROOT'].'/mvc/controller/controllerVideos.php');
Route::add('/server/videos',function(){
    if(controlAcess())((new controllerVideos())->find());
},'get');

Route::add('/server/videos/([0-9]*)',function($id){
   if(controlAcess())((new controllerVideos())->findById($id));
},'get');

Route::add('/server/videos',function(){
    if(controlAcess())((new controllerVideos())->save());
},'post');

Route::add('/server/videos',function(){
    if(controlAcess())((new controllerVideos())->del());
},'delete');
//###############################################################################


//###############################################################################
require_once($_SERVER['DOCUMENT_ROOT'].'/mvc/controller/controllerNoticias.php');
Route::add('/server/site/slideShowNews/',function(){
   ((new controllerNoticias())->findSlideShow($menuSubMenu=""));
},'get');

Route::add('/server/site/slideShowNews/(.*)/',function($menuSubMenu){
   ((new controllerNoticias())->findSlideShow($menuSubMenu));
},'get');

Route::add('/server/site/slideShowNews/(.*)/(.*)/',function($menuSubMenu){
   ((new controllerNoticias())->findSlideShow($menuSubMenu));
},'get');


Route::add('/server/site/homeNews/',function(){
   ((new controllerNoticias())->findHome());
},'get');


Route::add('/server/site/News/(.*)/',function($menuSubMenu){
   ((new controllerNoticias())->findMenu($menuSubMenu));
},'get');

Route::add('/server/site/News/(.*)/(.*)/',function($menuSubMenu){
   ((new controllerNoticias())->findMenu($menuSubMenu));
},'get');



Route::add('/server/noticias',function(){
   if(controlAcess())((new controllerNoticias())->find());
},'get');

Route::add('/server/noticias/([0-9]*)',function($id){
   if(controlAcess())((new controllerNoticias())->findById($id));
},'get');

Route::add('/server/noticias',function(){
    if(controlAcess())((new controllerNoticias())->save());
},'put');

Route::add('/server/noticias',function(){
    if(controlAcess())((new controllerNoticias())->del());
},'delete');
//###############################################################################


//###############################################################################
Route::add('/server/noticiasAnexo',function(){
   if(controlAcess())((new controllerNoticiasAnexo())->find());
},'get');

Route::add('/server/noticiasAnexo/([0-9]*)',function($id){
   if(controlAcess())((new controllerNoticiasAnexo())->findById($id));
},'get');

Route::add('/server/noticiasAnexo',function(){
    if(controlAcess())((new controllerNoticiasAnexo())->save());
},'put');

Route::add('/server/noticiasAnexo',function(){
    if(controlAcess())((new controllerNoticiasAnexo())->del());
},'delete');
//###############################################################################


//###############################################################################
Route::add('/server/noticiasFotos',function(){
   if(controlAcess())((new controllerNoticiasFotos())->find());
},'get');

Route::add('/server/noticiasFotos/([0-9]*)',function($id){
   if(controlAcess())((new controllerNoticiasFotos())->findById($id));
},'get');

Route::add('/server/noticiasFotos',function(){
    if(controlAcess())((new controllerNoticiasFotos())->save());
},'put');

Route::add('/server/noticiasFotos',function(){
    if(controlAcess())((new controllerNoticiasFotos())->del());
},'delete');
//###############################################################################


//###############################################################################
Route::add('/server/tiposAnuncios',function(){
   if(controlAcess())((new controllerTiposAnuncios())->find());
},'get');

Route::add('/server/tiposAnuncios/([0-9]*)',function($id){
   if(controlAcess())((new controllerTiposAnuncios())->findById($id));
},'get');

Route::add('/server/tiposAnuncios',function(){
    if(controlAcess())((new controllerTiposAnuncios())->save());
},'put');

Route::add('/server/tiposAnuncios',function(){
    if(controlAcess())((new controllerTiposAnuncios())->del());
},'delete');
//###############################################################################


//###############################################################################
require_once($_SERVER['DOCUMENT_ROOT'].'/mvc/controller/controllerAnuncios.php');
Route::add('/server/site/banners/(.*)',function($nameType){
   ((new controllerAnuncios())->findbyType(urldecode($nameType)));
},'get');

Route::add('/server/anuncios',function(){
   if(controlAcess())((new controllerAnuncios())->find());
},'get');

Route::add('/server/anuncios/([0-9]*)',function($id){
   if(controlAcess())((new controllerAnuncios())->findById($id));
},'get');

Route::add('/server/anuncios',function(){
    if(controlAcess())((new controllerAnuncios())->save());
},'put');

Route::add('/server/anuncios',function(){
    if(controlAcess())((new controllerAnuncios())->del());
},'delete');
//###############################################################################


//###############################################################################
Route::add('/server/usuarios',function(){
   if(controlAcess())((new controllerUsuarios())->find());
},'get');

Route::add('/server/usuarios/([0-9]*)',function($id){
   if(controlAcess())((new controllerUsuarios())->findById($id));
},'get');

Route::add('/server/usuarios',function(){
    if(controlAcess())((new controllerUsuarios())->save());
},'put');

Route::add('/server/usuarios',function(){
    if(controlAcess())((new controllerUsuarios())->del());
},'delete');
//###############################################################################

Route::add('/admin/(.*)',function(){
    include($_SERVER['DOCUMENT_ROOT'].'/mvc/view/admin/404.php');
},'get');




Route::run('/');


?>