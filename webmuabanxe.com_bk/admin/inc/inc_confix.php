<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?
 $query = "Select * FROM  tb_config ";
 $result = mysql_query($query);
 $rs= mysql_fetch_array($result);

	$project_title=$rs["project_name"];
	$project_note=$rs["project_note"];
	$project_copyright=$rs["project_copyright"];
	$project_email=$rs["project_email"];
	//$project_path = $rs["project_path"];
   
	$s_path = $_SERVER['PHP_SELF'];
	//echo"$s_path";
	$s_path = substr( $s_path, 0, strpos( $s_path, "admin" ) ) ;
	//echo"<br>$s_path";
	$path_tuyet_doi = $s_path."admin";
 
 $style_admin=gia_tri_mot_cot("tb_config_style","activate",1,"style_code");

//TIENG VIET

//BANNER TOP
$banner_top_tieude=$project_title;
//BANNER TOP
$banner_bottom_tieude=$project_copyright;

//LOGIN
$login_tieude="LOGIN";
$login_user="Username: ";
$login_pass="Password: ";
$login_change="Change";

$login_pass_old="Old password: ";

$login_new_user="New User: ";
$login_change_pass_page="Change Password";

$login_tb_1="Invalid User or password. Please try again.";
$login_tb_2="Invalid User or password. Please try again.";

$login_tb_3="User or password is deactivate, Please contact admin.";
$login_buttom="Login";

//LOGIN
$menu_tieude="MAIN MENU";
$menu_trang_chu="Home";
$menu_guest_book="Guest Book";
$menu_business_partner="Newsletter";
$menu_shopping_cart="Shopping Cart";
$menu_forum="Forum";
$menu_forum_member="Members";
$menu_forum_setting="Setting";

$menu_don_dat_hang="Orders";
$menu_khach_hang = "Members";
$menu_khach_hang_add = "Add new members";
$menu_tax = "Tax";
$menu_discount = "Discount";
$menu_percent = "Percent";

$menu_mat_dinh = "Default";


$menu_images="Images Management";
$menu_file="Files Management";
$menu_tim_kiem="Search";
$menu_dieu_khien="Control";
$menu_config_site="Site Config";
$menu_cap_tai_khoan="User Account";
$menu_doi_mat_khau="Change password";
$menu_logout="Logout";
$menu_luot_truy_cap="Visitors";


//MAIN
$main_sort_by="Sort by: ";
$main_sort_view="View: ";
$main_tieu_de_stt="NO.";
$main_tieu_de_trang="Page";
$main_tieu_de_thong_ke="Statistics";
$main_tieu_de_in_folder="View";
$main_tieu_de_thu_tu="Sort";
$main_tieu_de_update="Update";
$main_sub_folder="Sub folder";
$main_in_folder="Sub catalog";
$main_view_item="Items";

$main_folder="Name Folder";
$main_bai_moi="News item(s) - Offline";
$main_bai="Item(s) online";
$main_bai_all="Item(s) all";
$main_visitor="Visitor(s)";
$main_on_off="On/Off";
$main_new_folder="New folder";
$main_buttom_sort_do="Sort do";
$main_buttom_sort_reset="Reset";

//VIEW ITEMS
$view_item_num="Item(s) online";
$view_item_new="Add new item";
$view_item_reset="Reset";
$view_item_save="Save";


$view_banner_new="Add new banner";
$view_item_view_all="View all";
$view_item_view_tieu_bieu="View typical";
$view_item_selet_all="Select all";
$view_item_unselet_all="Clear all";
$view_item_select="Select";
$view_item_chuyen="Change catalog";
$view_item_edit="Edit item";
$view_banner_edit="Edit banner";

$view_item_view_content="View content ";
$view_item_small_images="Small images ";
$view_item_images_large="Images Large ";

$view_item_images="Images";
$view_item_files="Files";
$view_item_flash="Flash";
$view_item_poster="Poster";
$view_item_content="Content";
$view_item_description="Description";
$view_item_key_word="Key word";
$view_item_content_vip="Content VIP";

$view_item_content_1="Topic";
$view_item_content_2="Photo";
$view_item_content_3="In/out";
$view_item_content_4="Xem360";
$view_item_content_5="Video";
$view_item_content_6="Pro";

$view_item_detail="Detail";

$view_item_movie="Movie";
$view_item_tieude="Title";
$view_item_code="Code";
$view_item_size="Size";
$view_item_price="Price";
$view_item_price_note="Price Note";
$view_item_color="Color";
$view_item_sell_off="Sell Off";
$view_item_made="Made: ";
$view_item_qty="Qty ";
$view_item_status ="Status ";
$view_item_mark ="Mark ";
$view_item_type = "Type";
$view_item_typing = "Typing";
$view_item_short_content="Mô tả:";
$view_item_view_content="View content";
$view_item_ma="Code ";
$view_item_link="Link";
$view_item_link_target="Target";

$view_item_nguyen_hop="Theo xe gồm:";
$view_item_bao_hanh="Bảo hành:";
$view_item_visitors="Visitors:";
$view_item_khuyen_mai="Khuyến mãi:";
$view_item_tien_nghi="Tiện nghi:";
$view_item_thang_gia="Thang giá:";
$view_item_nam_san_xuat="Năm sản xuất:";
$view_item_catalog="Dòng xe:";
$view_item_cho_ngoi="Chỗ ngồi:";

$view_item_thumbnail="Thumbnail";
$view_item_cut="Cut";
$view_item_none="None";

$view_item_thumbnail_w="Width";
$view_item_thumbnail_h="Height";

$view_item_thumbnail_width=120;
$view_item_thumbnail_height=100;
$view_item_thumbnail_width_lon=400;
$view_item_thumbnail_height_lon=350;

$view_item_tieu_biet="Typical";
$view_item_quyen="Permission";
$view_item_quyen_0="1.5 Permission";
$view_item_quyen_1="1.0 Permission";
$view_item_quyen_2="2.0 Permission";
$view_item_xen="View";
$view_item_cua="of";

$view_item_buttom_tieu_bieu="Typical";
$view_item_buttom_khong_tieu_bieu="Un typical";
$view_item_buttom_hien_thi="Online";
$view_item_buttom_khong_hien_thi="Offline";
$view_item_buttom_xoa="Delete";

$view_item_ngay="Date: ";
$view_item_gio="Time: ";
$view_item_sort_num="Sort num: ";

$menu_industry_01="Brand";
$menu_industry_02="Life Stage";
//IMAGES
$images_upload_management="Upload Management";
$item_poster="Poster: ";
$item_note="Note";
$item_name="Name: ";
$item_email="Email: ";

//THONG BAO
$thong_bao_cho_xoa="Are you sure you want to delete ?";
$thong_bao_yes="Yes";
$thong_bao_cancel="Cancel";

//UPLOAD
$upload_file_01="File 01: ";
$upload_file_02="File 02: ";
$upload_file_03="File 03: ";
$upload_file_04="File 04: ";
$upload_file_05="File 05: ";

$upload="Upload";
$upload_select_folder="Select folder";
//DELETE

$delete_page="Delete";
$wait_delete_page="Wait";
$edit_page="Edit";
$delete_completed="Deleting Completed !";

//UPDATE

$update_page="Update";
$add_page="Add";
$update_completed="Update completed !";
$activat_completed="Activate completed !";
$deactivat_completed="Deactivate completed !";

//NOTE
$note_statictics="View detail";
$change_style="Change style";
$style="Style ";
?>