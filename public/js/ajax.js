/*admin/index.php*/
$(document).ready(function() {

    // $('#tags').tokenfield({duplicateChecker: 'icompare'});
    /*$('#tags').tokenfield({duplicateChecker: 'compare'});*/
    $('#tags').on('tokenfield:createtoken', function (event) {
        var existingTokens = $(this).tokenfield('getTokens');
        $.each(existingTokens, function (index, token) {
            if (token.value === event.attrs.value)
                event.preventDefault();
        });
    });

    $('#tags').tokenfield({

        autocomplete: {
            source: ['دادگاه', 'قضایی.', 'حقوق.'],
            delay: 100
        },
        showAutocompleteOnFocus: true
    });

    $("form#fpost").submit(function (e) {
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        if($.trim($('input:text[name=title]').val()).length == 0)
        {
            alert("Please Enter title");
            return false;
        }
        else if($.trim($('.detail').val()).length == 0)
        {
            alert("Please Enter detail");
            return false;
        }


        var title = $('input:text[name=title]').val();
        var alt = $('input:text[name=alt_image]').val();
        var cat = $('#categury').val();
        var text = $('.detail').val();
        var tags = $('input:text[name=tags]').val();
        var approve = $('#approve').val();
        var submit = $('#submit').val();
        var formData = new FormData($(this)[0]);
        formData.append("title", title);
        formData.append("alt_image", alt);
        formData.append("categury", cat);
        formData.append("detail", text);
        formData.append("tags", tags);
        formData.append("approve", approve);
        formData.append("submit", submit);
        $('#submit').attr("disabled","disabled");
        $.ajax({
            url: 'adminpost/addpost/',
            type: 'POST',
            data: formData,
            async: false,
            enctype: 'multipart/form-data',
            beforeSend:function(){
                $('#submit').val('در حال ثبت...');
            },
            success: function (data) {
                if (data == "ok") {
                    $(".insertok").fadeIn(data).fadeOut(4000);
                    $("form#fpost").resetForm();
                    CKEDITOR.instances[instance].setData('');
                    $('#tags').tokenfield('setTokens',[]);
                    $('#submit').attr("disabled",false);
                    $('#submit').val('افزودن');
                }
                if (data == "no") {
                    $(".inserterr").fadeIn(data).fadeOut(4000);
                    $('#submit').attr("disabled",false);
                    $('#submit').val('افزودن');
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });

        return false;
    });


	 function get_cat()
	 {
		 $.post("actions/select_cat.php",{},function(data){
			 $("#test_cat").html(data);
		 });
	 }
	 get_cat();

	$(document).on('click', '#add_cat', function () {
		if ($('#cat_name').val() == '' || $('#cat_link').val() == '')
		{
			$('#shows_message').html("<div class= 'alert alert-danger alert-dismissible' role= 'alert'><button type= 'button' class= 'close' data-dismiss= 'alert' aria-label= 'Close'><span aria-hidden= 'true'>&times;</span></button><strong>اخطار! </strong> نام دسته بندی ضروری</div>");
			return false;
		} else
		{
			var cat_name = $('#cat_name').val();
			var cat = $('#cat').val();
			var cat_link = $('#cat_link').val();
			$.post('actions/add-cat.php', {cat_name: cat_name, cat: cat, cat_link:cat_link}, function (data) {
				$('#shows_message').html(data);
				get_cat();
			});
		}
	});
	function edit_cat(id1, text1, column_name1)
	{
					$.ajax({
						url:"actions/edit-cat.php",
						method:"POST",
						data:{id1:id1, text1:text1, column_name1:column_name1},
						dataType:"text",
						success:function(data){
							 $('#shows_message').html(data);
						}
				   });
	}
	$(document).on("blur",".cat_name", function() {
		var id = $(this).data("id1");
		var cat_name = $(this).text();
		if(cat_name =="")
		{
			$('#shows_message').html("<div class= 'alert alert-danger alert-dismissible' role= 'alert'><button type= 'button' class= 'close' data-dismiss= 'alert' aria-label= 'Close'><span aria-hidden= 'true'>&times;</span></button><strong>اخطار! </strong> نام دسته بندی نمی تواند خالی باشد</div>");
			return false;
		}
		edit_cat(id, cat_name, "cat_name");
	});
	$(document).on("blur",".cat_link", function() {
		var id = $(this).data("id2");
		var link1 = $(this).text();
		if(link1 =="")
		{
			$('#shows_message').html("<div class= 'alert alert-danger alert-dismissible' role= 'alert'><button type= 'button' class= 'close' data-dismiss= 'alert' aria-label= 'Close'><span aria-hidden= 'true'>&times;</span></button><strong>اخطار! </strong> نام دسته بندی نمی تواند خالی باشد</div>");
			return false;
		}
		edit_cat(id, link1, "link");
	});
			$(document).on("click",".delete_cat", function() {
				var id = $(this).data("id3");
				if(confirm("حذف شود؟"))
				{
					$.ajax({
						url:"actions/delete-cat.php",
						method:"POST",
						data:{id:id},
						datatype:"text",
						success:function(data)
						{
							$('#shows_message').html(data);
							get_cat();
						}
					});
				}
			});
});

/*admin-setting.php*/
$(document).ready(function(){
	$("#num_addAdmin").click(function(){
		if($("#show_admin") == "")
		{
			$("#show_setting").html("<div class= 'alert alert-danger alert-dismissible' role= 'alert'><button type= 'button' class= 'close' data-dismiss= 'alert' aria-label= 'Close'><span aria-hidden= 'true'>&times;</span></button><strong>اخطار! </strong> تعداد نمایش نمی تواند خالی باشد</div>");
			return false;
		}
		else
		{
			var admin_t = true;
			var show_admin = $("#show_admin").val();
			$.post("actions/admin-setting.php",{show_admin:show_admin,admin_t:admin_t},function(data){
				$("#show_setting").html(data);
			});
		}
	});
	//
	$("#num_add").click(function(){
		if($("#show_post") == "")
		{
			$("#show_setting").html("<div class= 'alert alert-danger alert-dismissible' role= 'alert'><button type= 'button' class= 'close' data-dismiss= 'alert' aria-label= 'Close'><span aria-hidden= 'true'>&times;</span></button><strong>اخطار! </strong> تعداد نمایش نمی تواند خالی باشد</div>");
			return false;
		}
		else
		{
			var post = true;
			var show_post = $("#show_post").val();
			$.post("actions/admin-setting.php",{show_post:show_post,post:post},function(data){
				$("#show_setting").html(data);
			});
		}
	});
});

/*slider-content.php*/
$(document).ready(function() {
    function fetch_datas() {
        $.post('actions/select_slider.php', {}, function (data) {
            $('#table_shows').html(data);
        });
    }
    fetch_datas();

    $("#form1").submit(function()
    {
        if ($('#pic_slider').val()== '' && $('#pic_slider_sm').val()== '')
        {
            $("#show_add").html("<div class= 'alert alert-danger alert-dismissible' role= 'alert'><button type= 'button' class= 'close' data-dismiss= 'alert' aria-label= 'Close'><span aria-hidden= 'true'>&times;</span></button><strong>اخطار! </strong> انتخاب تصویر الزامی است</div>");
            return false;
        }
        else
        {
            var set={target:"#show_add",beforeSubmit:before};
            $("#form1").ajaxSubmit(set);
            return false;
            $('#pic_slider').val("");
            $('#pic_slider_sm').val("");
            $('#alt_slider').val("");
            $('#title_slider').val("");
        }
    });
    $(document).on('click', '.del_slider', function () {
        var slider_id = $(this).data('id5');
        if (confirm("آیا مطمئن هستید برای پاک کردن اسلایدر؟"))
        {
            $.post('actions/delete-slider-content.php', {slider_id: slider_id}, function (data) {
                $('#show_del').html(data);
                fetch_datas();
            });
        }
    });
});

function before()
{
    $("#show").html("<img src='../images/AjaxLoader.gif'/>در حال آپلود فایل");
}

/*edit-slider-content.php*/
$(document).ready(function() {
    $("#form2").submit(function()
        {
            var sets={target:"#show_up",beforeSubmit:befores};
            $("#form2").ajaxSubmit(sets);
            return false;
        }
    );

});

function befores()
{
    $("#show_up").html("<img src='../images/AjaxLoader.gif'/>در حال بروزرسانی ");
}

/*admin/cat-news.php*/
$(document).ready(function(){
    function get_cat_news()
    {
        $.post("actions/select_cat_news.php",{},function(data){
            $("#test_cat_news").html(data);
        });
    }
    get_cat_news();

    $(document).on('click', '#add_cat_news', function () {
        if ($('#cat_name_news').val() == '')
        {
            $('#shows_message').html("<div class= 'alert alert-danger alert-dismissible' role= 'alert'><button type= 'button' class= 'close' data-dismiss= 'alert' aria-label= 'Close'><span aria-hidden= 'true'>&times;</span></button> نام دسته بندی ضروری</div>");
            return false;
        } else
        {
            var cat_name = $('#cat_name_news').val();
            var cat = $('#cat_news').val();
            $.post('actions/add-cat-news.php', {cat_name: cat_name, cat: cat}, function (data) {
                $('#shows_message').html(data);
                get_cat_news();
            });
        }
    });
    function edit_cat_news(id1, text1, column_name1)
    {
        $.ajax({
            url:"actions/edit-cat-news.php",
            method:"POST",
            data:{id1:id1, text1:text1, column_name1:column_name1},
            dataType:"text",
            success:function(data){
                $('#shows_message').html(data);
            }
        });
    }
    $(document).on("blur",".cat_name_news", function() {
        var id = $(this).data("id1");
        var cat_name = $(this).text();
        if(cat_name =="")
        {
            $('#shows_message').html("<div class= 'alert alert-danger alert-dismissible' role= 'alert'><button type= 'button' class= 'close' data-dismiss= 'alert' aria-label= 'Close'><span aria-hidden= 'true'>&times;</span></button>.نام دسته بندی نمی تواند خالی باشد</div>");
            return false;
        }
        edit_cat_news(id, cat_name, "cat_name");
    });
    $(document).on("click",".delete_cat_news", function() {
        var id = $(this).data("id3");
        if(confirm("حذف شود؟"))
        {
            $.ajax({
                url:"actions/delete-cat-news.php",
                method:"POST",
                data:{id:id},
                datatype:"text",
                success:function(data)
                {
                    $('#shows_message').html(data);
                    get_cat_news();
                }
            });
        }
    });
});
/*admin/add-banner-ads-main.php*/
/*$(document).ready(function(){
    function banner()
    {
        $.post("actions/select_banner_main.php",{},function(data){
            $("#show_banner_main").html(data);
        });
    }
    banner();

$(document).on('click', '#add_banner_main', function () {
        if ($('#place_banner').val() == '' || $('#pic_banner_main').val() == '')
        {
            $('#shows_message').html("<div class= 'alert alert-danger alert-dismissible' role= 'alert'><button type= 'button' class= 'close' data-dismiss= 'alert' aria-label= 'Close'><span aria-hidden= 'true'>&times;</span></button>تمامی فیلدها ضروری هستند.</div>");
            return false;
        } else
        {
            var place_banner = $('#place_banner').val();
            var pic_banner_main = $('#pic_banner_main').val();
            var banner_main = $('#banner_main').val();
            $.post('actions/add-cat.php', {place_banner: place_banner, pic_banner_main: pic_banner_main, banner_main:banner_main}, function (data) {
                $('#shows_alert_main').html(data);
                get_cat();
            });
        }
    });*/
