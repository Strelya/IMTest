<div class="sub-cate">
    <div class=" top-nav rsidebar span_1_of_left">
        <h3 class="cate">КАТЕГОРИИ</h3>
        <ul class="menu">
            <li>
              <ul class="kid-menu">
                  @foreach(App\Categories::all() as $category)
                <li><a href="/categories/{{$category->id}}">{{$category->cat_name}}</a></li>
                      @endforeach
              </ul>
        </ul>
    </div>
    <!--initiate accordion-->
    <script type="text/javascript">
        $(function() {
            var menu_ul = $('.menu > li > ul'),
                menu_a  = $('.menu > li > a');
            menu_ul.hide();
            menu_a.click(function(e) {
                e.preventDefault();
                if(!$(this).hasClass('active')) {
                    menu_a.removeClass('active');
                    menu_ul.filter(':visible').slideUp('normal');
                    $(this).addClass('active').next().stop(true,true).slideDown('normal');
                } else {
                    $(this).removeClass('active');
                    $(this).next().stop(true,true).slideUp('normal');
                }
            });

        });
    </script>
</div>
<div class="clearfix"> </div>
</div>