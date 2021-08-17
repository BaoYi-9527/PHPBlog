<script>
    // dom加载完毕立即执行
    $(function(){
        // 移除部分a元素的点击事件
        $('.layui-nav-child').find('dd').find('a').unbind('click')
    })
</script>
