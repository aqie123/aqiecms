/**
 * 添加按钮
 */

$('#addMenu a').click(function(){
    // alert(1);
    var url = SCOPE.add_url;
    window.location.href=url;
});
/**
 * addMenu提交表单      通用的，将表单数据提交
 */
$('#singcms-button-submit').click(function(){
    // 获取表单数据
    // alert(1)
    var data = $('#singcms-form').serializeArray();
    console.log(data);   // 对象
    postData = {};
    $(data).each(function(i){
        postData[this.name]= this.value;
    });
    // console.log(postData);return;
    // 将获取到数据post到服务器
    url = SCOPE.save_url;
    jump_url = SCOPE.jump_url;
    $.post(url,postData,function (result) {
        if(result.status==1){
            // 成功提交
            return dialog.success(result.message,jump_url);
        }else if(result.status==0){
            return dialog.error(result.message);
        }
    },"JSON")
});

/**
 * 编辑操作 (传递id)  通用的
 */
$(".singcms-edit").on('click',function(){

    var id = $(this).attr('attr-id');
    // alert(id);
    var url = SCOPE.edit_url + '&id='+id;
    window.location.href=url;

});

/**
 * 删除操作
 */
$('.singcms-del').on('click',function(){
    var id = $(this).attr('attr-id');
        // alert(id);
    var message = $(this).attr("attr-message");
    // alert(message);
    var url = SCOPE.set_status_url;
    // alert(url);
    data = {};
    data['id'] = id;
    data['status'] = -1;

    layer.open({
        type : 0,
        title : '是否提交？',
        btn: ['yes', 'no'],
        icon : 3,
        closeBtn : 2,
        content: "是否确定"+message,
        scrollbar: true,
        yes: function(){
            // 执行相关跳转
            todelete(url, data);
        }
    });
});
function todelete(url,data) {
    $.post(
        url,
        data,
        function(s){
            if(s.status == 1) {
                // 进行跳转
                return dialog.success(s.message,'');
            }else {
                return dialog.error(s.message);
            }
        }
    ,"JSON");
}

/**
 * 排序操作（菜单，文章）
 */
$('#button-listorder').click(function(){
    // 获取listorder内容
    var data = $('#singcms-listorder').serializeArray();
    postData = {};
    $(data).each(function(i){       // 遍历数据
        postData[this.name] = this.value;
    })
    // console.log(data);
    var url = SCOPE.listorder_url;
    $.post(url,postData,function(result){
        if(result.status ==1){
            // 成功
            return dialog.success(result.message,result['data']['jump_url']);
        }else if(result.status ==0){
            return dialog.error(result.message,result['data']['jump_url']);
        }
    },"JSON")

});

/**
 *点击更改文章显示状态 0 <-> 1
 */
$('.singcms-on-off').on('click', function(){

    var id = $(this).attr('attr-id');
    var status = Number($(this).attr("attr-status"));
    var url = SCOPE.set_status_url;
    //console.log(status);
    data = {};
    data['id'] = id;
    data['status'] = status;
    console.log(data['status']);

    layer.open({
        type : 0,
        title : '是否提交？',
        btn: ['yes', 'no'],
        icon : 3,
        closeBtn : 2,
        content: "是否确定更改状态",
        scrollbar: true,
        yes: function(){
            // 执行相关跳转
            todelete(url,data);
        }
    });
});

$("#singcms-push").click(function(){
    var id = $("#select-push").val();
    // alert(id);
    if(id == 0){
        return dialog.error("请选择推荐位");
    }
    push = {};
    postData = {};
    $("input[name = 'pushcheck']:checked").each(function(i){
        push[i] = $(this).val();
    });

    postData['push'] = push;
    postData['position_id'] = id;
    // console.log(postData);return;
    var url = SCOPE.push_url;
    $.post(url,postData,function (result) {
        if(result.status == 1){
            // todo
            return dialog.success(result.message,result['data']['jump_url']);
        }
        if(result.status == 0) {
            // TODO
            return dialog.error(result.message);
        }
    },"JSON");
});

