<html>
<script type="text/javascript" src="node_modules/tinymce/tinymce.min.js"></script>
	<?php
	
$soc = $_SESSION['soc_name'];
?>

<script type="text/javascript">
    tinyMCE.init({
      mode : "textareas"
    });
    </script>
    <script type="text/javascript">
  tinyMCE.init({
    theme : "advanced",
    mode : "textareas",
    plugins : "fullpage",
    theme_advanced_buttons3_add : "fullpage"
  });
  
var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

tinymce.init({
  selector: 'textarea#full-featured',
  plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable export',
  tinydrive_token_provider: 'URL_TO_YOUR_TOKEN_PROVIDER',
  tinydrive_dropbox_app_key: 'YOUR_DROPBOX_APP_KEY',
  tinydrive_google_drive_key: 'YOUR_GOOGLE_DRIVE_KEY',
  tinydrive_google_drive_client_id: 'YOUR_GOOGLE_DRIVE_CLIENT_ID',
  mobile: {
    plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker textpattern noneditable help formatpainter pageembed charmap mentions quickbars linkchecker emoticons advtable'
  },
  menu: {
    tc: {
      title: 'Comments',
      items: 'addcomment showcomments deleteallconversations'
    }
  },
  menubar: 'file edit view insert format tools table tc help',
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
  autosave_ask_before_unload: true,
  autosave_interval: '30s',
  autosave_prefix: '{path}{query}-{id}-',
  autosave_restore_when_empty: false,
  autosave_retention: '2m',
  image_advtab: true,
  link_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_list: [
    { title: 'My page 1', value: 'https://www.tiny.cloud' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' }
  ],
  importcss_append: true,
  templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
    { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
    { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
  ],
  template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
  template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
  height: 600,
  image_caption: true,
  quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
  noneditable_noneditable_class: 'mceNonEditable',
  toolbar_mode: 'sliding',
  spellchecker_ignore_list: ['Ephox', 'Moxiecode'],
  tinycomments_mode: 'embedded',
  content_style: '.mymention{ color: gray; }',
  contextmenu: 'link image imagetools table configurepermanentpen',
  a11y_advanced_options: true,
  skin: useDarkMode ? 'oxide-dark' : 'oxide',
  content_css: useDarkMode ? 'dark' : 'default',
  /*
  The following settings require more configuration than shown here.
  For information on configuring the mentions plugin, see:
  https://www.tiny.cloud/docs/plugins/premium/mentions/.
  */
  
});


</script>

        
        <body>
        
        <div class="container-fluid">
        
        <form action=<?php echo "\"new_post2.php?soc=".$soc["soc_name"]."\"";?> method="post" enctype="multipart/form-data">
  

       
  
    <div class="mb-3 mt-3">
    <label for="email" class="form-label">Post Title:</label>
    <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
     </div>
     <div class="mb-3">
    <label for="text">Post Text or Add a Link (optional):</label>
    
<textarea class="form-control" rows="10" id="full-featured" name="text" placeholder="Enter text"> </textarea>
    <!--<textarea name="text" placeholder="Post Text (optional)"></textarea>--->
    </div>
     <div class="mb-3">
     <label for="image">Add a Image (optional):</label>
    <input type="file" id="image" name="image">
        </div>
     <div class="mb-3">
 <button type="submit" class="btn btn-success">Submit post</button>
    
  </form>


 
<style>
  .container-fluid {
   max-width:100%;
   
}
</style>
</body>
</html>

