<footer id="footer">
        <div class="footer1">
                <div class="guanyu">
                       <h2>关于我们</h2>
                       <p>普西学术集成海量学术资源，为科研工作者提供，全面快捷的学术服务。</p>
                       <p>在这里我们保持学习的态度，不忘初心，砥砺前行。</p>
                       <a href="/aboutus{{config('myroute.suffix','html')}}">了解更多>>>></a>
                </div>
                <div class="lianxi">
                    <h3>联系我们</h3>
                    <span class="lianxi_img">
                            <br>
                       <!-- <a href="#"> <img src="./image/weixin.png" alt=""></a>
                       <a href="#"> <img src="./image/QQ.png" alt=""></a>
                       <a href="#"> <img src="./image/weibo.png" alt=""></a> -->
                        <p>咨询电话：{{$site->phone}}</p><br>
                        <p>咨询微信：{{$site->wechat}}</p>

                    </span>
                </div>
            </div>
            <div class="footer2">
                <span>{{$site->copyright}}</span>
            </div>
</footer>