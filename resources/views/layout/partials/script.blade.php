<!--直接使用layui-JQuery-->
<script >let $ = jQuery = layui.jquery;</script>
<!--公共脚本函数-->
<script>
    // 日期格式
    function dateFormat() {
        Date.prototype.format = function (fmt) {
            let o = {
                "M+": this.getMonth() + 1,                   //月份
                "d+": this.getDate(),                        //日
                "h+": this.getHours(),                       //小时
                "m+": this.getMinutes(),                     //分
                "s+": this.getSeconds(),                     //秒
                "q+": Math.floor((this.getMonth() + 3) / 3), //季度
                "S": this.getMilliseconds()                  //毫秒
            };

            //  获取年份
            // ①
            if (/(y+)/i.test(fmt)) {
                fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
            }

            for (let k in o) {
                // ②
                if (new RegExp("(" + k + ")", "i").test(fmt)) {
                    fmt = fmt.replace(
                        RegExp.$1, (RegExp.$1.length === 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
                }
            }
            return fmt;
        }
    }

    // 简单的 JS 请求 数据更新/删除操作
    function request(url, type='GET', data = {}, dataType = 'json', successMsg = '操作成功', msgTime = 1000) {
        $.ajax({
            url:url,
            type:type,
            data:data,
            dateType:dataType,
            success:function (response) {
                if (response.code === 200) {
                    layer.msg(successMsg,{icon:6, time: msgTime},function () {
                        location.reload()
                    })
                } else {
                    layer.msg(response.message,{icon:5})
                }
            },
            error:function (XMLRequest) {
                layer.msg(XMLRequest.statusText,{icon:5})
            }
        })
    }

</script>
