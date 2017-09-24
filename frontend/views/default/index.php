<?php
$this->title = '伏羲教育首页';
$this->registerMetaTag(array("name"=>"keywords","content"=>"伏羲教育首页"));
$this->registerMetaTag(array("name"=>"description","content"=>"伏羲教育首页"));
$this->registerCssFile('@web/css/home.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerCssFile('@web/css/swiper.min.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/js/home.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
$this->registerJsFile('@web/js/swiper.min.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
?>
<!--内容-->
<div class="banner">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image: url(img/banner-home1.jpg);"></div>
            <div class="swiper-slide" style="background-image: url(img/banner-home2.jpg);"></div>
            <div class="swiper-slide" style="background-image: url(img/banner-home3.jpg);"></div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<div class="about">
    <div class="wrap">
        <div class="home-title">
            <h2>About Fu Xi</h2>
            <h1>关于伏羲</h1>
            <span></span>
        </div>
        <div class="about-text">
            <p>古琴，是华夏民族最古老的乐器之一，相传为伏羲所造。</p>
            <p>古琴，历史源远流长，文化底蕴博大精深。</p>
            <p>琴者，情也。抚琴静中有动，心静而指不停歇。</p>
            <p>&nbsp;</p>
            <p>中艺伏羲古琴文化有限公司籍琴聚友，传播广褒中华文化，以清幽脱俗的古琴精髓结合悠久的中国文化，</p>
            <p>传播“人类非物质文化遗产代表-------古琴琴学”。</p>
        </div>
        <div class="about-main">
            <ul>
                <li>
                    <div class="about-icon"><span class="iconfont icon-jiangbei"></span></div>
                    <p>不忘初心</p>
                    <p>专注打造金牌国学品质</p>
                </li>
                <li>
                    <div class="about-icon"><span class="iconfont icon-kehu"></span></div>
                    <p>实力保障</p>
                    <p>顶级国学大师一对一授课</p>
                </li>
                <li>
                    <div class="about-icon"><span class="iconfont icon-diannao"></span></div>
                    <p>创新模式</p>
                    <p>传统与互联网权威教学法</p>
                </li>
                <li>
                    <div class="about-icon"><span class="iconfont icon-zuanshi"></span></div>
                    <p>品质服务</p>
                    <p>定期举办古琴音乐会</p>
                </li>
            </ul>
            <a href="about.html" class="about-button">了解更多</a>
        </div>
    </div>
</div>
<div class="course">
    <div class="wrap">
        <div class="home-title">
            <h2>Curriculum system</h2>
            <h1>课程体系</h1>
            <span></span>
        </div>
        <div class="about-main course-main">
            <ul>
                <li>
                    <div class="course-icon">
                        <span style="background-image: url(img/course01.jpg);"></span>
                    </div>
                    <span class="course-top">书法</span>
                    <p>即理法通达、笔力遒劲、<br />姿态优美</p>
                    <a href="#" class="course-button">咨询</a>
                </li>
                <li>
                    <div class="course-icon">
                        <span style="background-image: url(img/course02.jpg);"></span>
                    </div>
                    <span class="course-top">国画</span>
                    <p>力求达到线条美、结体美、<br />章法美、墨色美</p>
                    <a href="#" class="course-button">咨询</a>
                </li>
                <li>  
                    <div class="course-icon">
                        <span style="background-image: url(img/course03.jpg);"></span>
                    </div>
                    <span class="course-top">太极</span>
                    <p>始而意动，继而内动，再之外动，并形成刚柔相济</p>
                    <a href="#" class="course-button">咨询</a>
                </li>
                <li>
                    <div class="course-icon">
                        <span style="background-image: url(img/course04.jpg);"></span>
                    </div>
                    <span class="course-top">古琴</span>
                    <p>传承古法制琴经验，用匠心表达对古琴的敬意</p>
                    <a href="#" class="course-button">咨询</a>
                </li>
                <li>
                    <div class="course-icon">
                        <span style="background-image: url(img/course01.jpg);"></span>
                    </div>
                    <span class="course-top">古琴</span>
                    <p>传承古法制琴经验，用匠心表达对古琴的敬意</p>
                    <a href="#" class="course-button">咨询</a>
                </li>
                <li>
                    <div class="course-icon">
                        <span style="background-image: url(img/course02.jpg);"></span>
                    </div>
                    <span class="course-top">古琴</span>
                    <p>传承古法制琴经验，用匠心表达对古琴的敬意</p>
                    <a href="#" class="course-button">咨询</a>
                </li>
            </ul>
            <a href="curriculum.html" class="course-up"><span class="iconfont icon-bottom"></span></a>
            <div class="arrow">
                <div class="arrow-l"></div>
                <div class="arrow-r"></div>
            </div>
        </div>
    </div>
</div>
<div class="teachers">
    <div class="wrap">
        <div class="home-title">
            <h2>Teacher force</h2>
            <h1>师资力量</h1>
        </div>
        <div class="about-text">
            <p>中艺伏羲古琴文化有限公司，以琴汇友，是一个文化交流平台，业务范围涵盖：古琴文化论坛、销售、古琴音乐会、版权运作、精品课程学习。</p>
            <p>定期举办文化雅集，为琴师、斫琴师、收藏家、教育家、文化爱好者的一个聚集地，它的使命是传播古琴文化，</p>
            <p>把中国文化的琴道精神发扬与传承下去。</p>
        </div>
        <div class="teachers-banner">
            <ul>
                <li>
                    <div class="main">
                        <p>智泉</p>
                        <p>曾就读于中央美术学院、中国艺术研究院。双硕。</p>
                        <div class="more"><a href="teacher.html">+</a></div>
                    </div>
                    <img src="img/teacher/1.jpg"/>
                </li>
                <li>
                    <div class="main">
                        <p>智泉</p>
                        <p>曾就读于中央美术学院、中国艺术研究院。双硕。</p>
                        <div class="more"><a href="teacher.html">+</a></div>
                    </div>
                    <img src="img/teacher/2.jpg"/>
                </li>
                <li>
                    <div class="main">
                        <p>智泉</p>
                        <p>曾就读于中央美术学院、中国艺术研究院。双硕。</p>
                        <div class="more"><a href="teacher.html">+</a></div>
                    </div>
                    <img src="img/teacher/3.jpg"/>
                </li>
                <li>
                    <div class="main">
                        <p>智泉</p>
                        <p>曾就读于中央美术学院、中国艺术研究院。双硕。</p>
                        <div class="more"><a href="teacher.html">+</a></div>
                    </div>
                    <img src="img/teacher/4.jpg"/>
                </li>
                <li>
                    <div class="main">
                        <p>智泉</p>
                        <p>曾就读于中央美术学院、中国艺术研究院。双硕。</p>
                        <div class="more"><a href="teacher.html">+</a></div>
                    </div>
                    <img src="img/teacher/5.jpg"/>
                </li>
                <li>
                    <div class="main">
                        <p>智泉</p>
                        <p>曾就读于中央美术学院、中国艺术研究院。双硕。</p>
                        <div class="more"><a href="teacher.html">+</a></div>
                    </div>
                    <img src="img/teacher/6.jpg"/>
                </li>
                <li>
                    <div class="main">
                        <p>智泉</p>
                        <p>曾就读于中央美术学院、中国艺术研究院。双硕。</p>
                        <div class="more"><a href="teacher.html">+</a></div>
                    </div>
                    <img src="img/teacher/7.jpg"/>
                </li>
                <li>
                    <div class="main">
                        <p>智泉</p>
                        <p>曾就读于中央美术学院、中国艺术研究院。双硕。</p>
                        <div class="more"><a href="teacher.html">+</a></div>
                    </div>
                    <img src="img/teacher/7.jpg"/>
                </li>
            </ul>
            <ul>
                <li>
                    <div class="main">
                        <p>智泉</p>
                        <p>曾就读于中央美术学院、中国艺术研究院。双硕。</p>
                        <div class="more"><a href="teacher.html">+</a></div>
                    </div>
                    <img src="img/teacher/2.jpg"/>
                </li>
                <li>
                    <div class="main">
                        <p>智泉</p>
                        <p>曾就读于中央美术学院、中国艺术研究院。双硕。</p>
                        <div class="more"><a href="teacher.html">+</a></div>
                    </div>
                    <img src="img/teacher/1.jpg"/>
                </li>
                <li>
                    <div class="main">
                        <p>智泉</p>
                        <p>曾就读于中央美术学院、中国艺术研究院。双硕。</p>
                        <div class="more"><a href="teacher.html">+</a></div>
                    </div>
                    <img src="img/teacher/4.jpg"/>
                </li>
                <li>
                    <div class="main">
                        <p>智泉</p>
                        <p>曾就读于中央美术学院、中国艺术研究院。双硕。</p>
                        <div class="more"><a href="teacher.html">+</a></div>
                    </div>
                    <img src="img/teacher/4.jpg"/>
                </li>
                <li>
                    <div class="main">
                        <p>智泉</p>
                        <p>曾就读于中央美术学院、中国艺术研究院。双硕。</p>
                        <div class="more"><a href="teacher.html">+</a></div>
                    </div>
                    <img src="img/teacher/5.jpg"/>
                </li>
                <li>
                    <div class="main">
                        <p>智泉</p>
                        <p>曾就读于中央美术学院、中国艺术研究院。双硕。</p>
                        <div class="more"><a href="teacher.html">+</a></div>
                    </div>
                    <img src="img/teacher/6.jpg"/>
                </li>
            </ul>
            <div class="pagination"></div>
        </div>
    </div>
</div>
</div>
<div class="grow-scroll">
    <div class="grow">
        <div class="video">
            <div class="video-img-show"><span class="iconfont icon-bofang"></span><img src="img/experience/video1.jpg"/></div>
            <video  controls preload="auto">
                <source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4">
                <source src="http://vjs.zencdn.net/v/oceans.webm" type="video/webm">
                <source src="http://vjs.zencdn.net/v/oceans.ogv" type="video/ogg">
            </video>
        </div>
        <div class="video-more">
            <div class="video-icon"><span class="iconfont icon-bofang"></span></div>
            <div class="home-title">
                <h2>Student growth</h2>
                <h1>学员成长</h1>
                <span></span>
            </div>
            <p>增加国民素质，为成为地球村合格一员而努力。体现人生价值观，树立志高存远的责任感！</p>
            <a href="student.html" class="video-more-btn">查看更多</a>
        </div>
    </div>
    <div class="grow">
        <div class="video">
            <div class="video-img-show"><span class="iconfont icon-bofang"></span><img src="img/experience/video2.jpg"/></div>
            <video  controls preload="auto">
                <source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4">
                <source src="http://vjs.zencdn.net/v/oceans.webm" type="video/webm">
                <source src="http://vjs.zencdn.net/v/oceans.ogv" type="video/ogg">
            </video>
        </div>
        <div class="video-more">
            <div class="video-icon"><span class="iconfont icon-bofang"></span></div>
            <div class="home-title">
                <h2>Student growth</h2>
                <h1>学员成长</h1>
                <span></span>
            </div>
            <p>增加国民素质，为成为地球村合格一员而努力。体现人生价值观，树立志高存远的责任感！</p>
            <a href="student.html" class="video-more-btn">查看更多</a>
        </div>
    </div>
    <div class="grow">
        <div class="video">
            <div class="video-img-show"><span class="iconfont icon-bofang"></span><img src="img/experience/video3.jpg"/></div>
            <video  controls preload="auto">
                <source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4">
                <source src="http://vjs.zencdn.net/v/oceans.webm" type="video/webm">
                <source src="http://vjs.zencdn.net/v/oceans.ogv" type="video/ogg">
            </video>
        </div>
        <div class="video-more">
            <div class="video-icon"><span class="iconfont icon-bofang"></span></div>
            <div class="home-title">
                <h2>Student growth</h2>
                <h1>学员成长</h1>
                <span></span>
            </div>
            <p>增加国民素质，为成为地球村合格一员而努力。体现人生价值观，树立志高存远的责任感！</p>
            <a href="student.html" class="video-more-btn">查看更多</a>
        </div>
    </div>
</div>
<div class="grow-banner">
    <div class="wrap">
        <h1>古琴曲，曲风独特，意味悠长，学员体会分享给大家，趣味古琴曲赏析，一起感受《流水》的魅力吧！</h1>
        <h2>《流水》班学员体会与感受</h2>
        <div class="grow-banner-main">
            <div class="grow-banner-l"></div>
            <div class="grow-banner-scroll">
                <ul>
                    <li>
                        <div class="grow-banner-main-img" style="background-image: url(img/course03.jpg);"></div>
                        <div class="grow-banner-main-icon"></div>
                        <div class="grow-banner-main-text">时至今日，琴曲《流水》依然作为中国音乐的灵魂与精髓，镌刻在美国“旅行者”号太空飞船的金唱片里，昼夜不息地回响在茫茫的太空之中，寻觅着宇宙间的“知音”。古琴曲《流水》是一首极具表现力的乐曲，充分运用“滚、拂、打、进、退”等指法及上、下滑音，生动地描绘了流水的各种情态。旋律起首之音，时隐时现，犹如置身高山之巅，云雾缭绕，飘忽无定。</div>
                    </li>
                    <li>
                        <div class="grow-banner-main-img" style="background-image: url(img/course02.jpg);"></div>
                        <div class="grow-banner-main-icon"></div>
                        <div class="grow-banner-main-text">时至今日，琴曲《流水》依然作为中国音乐的灵魂与精髓，镌刻在美国“旅行者”号太空飞船的金唱片里，昼夜不息地回响在茫茫的太空之中，寻觅着宇宙间的“知音”。古琴曲《流水》是一首极具表现力的乐曲，充分运用“滚、拂、打、进、退”等指法及上、下滑音，生动地描绘了流水的各种情态。旋律起首之音，时隐时现，犹如置身高山之巅，云雾缭绕，飘忽无定。</div>
                    </li>
                    <li>
                        <div class="grow-banner-main-img" style="background-image: url(img/course01.jpg);"></div>
                        <div class="grow-banner-main-icon"></div>
                        <div class="grow-banner-main-text">时至今日，琴曲《流水》依然作为中国音乐的灵魂与精髓，镌刻在美国“旅行者”号太空飞船的金唱片里，昼夜不息地回响在茫茫的太空之中，寻觅着宇宙间的“知音”。古琴曲《流水》是一首极具表现力的乐曲，充分运用“滚、拂、打、进、退”等指法及上、下滑音，生动地描绘了流水的各种情态。旋律起首之音，时隐时现，犹如置身高山之巅，云雾缭绕，飘忽无定。</div>
                    </li>
                </ul>
            </div>
            <div class="grow-banner-r"></div>
        </div>
    </div>
</div>
<div class="news">
    <div class="wrap">
        <div class="home-title">
            <h2>News information</h2>
            <h1>新闻动态</h1>
            <span></span>
        </div>
        <div class="news-main">
            <ul>
                <li>
                    <div class="news-img">
                        <div class="img"><img src="img/banner-home3.jpg"/></div>
                        <h1>金润一演奏《获麟操》李祥霆大师指导</h1>
                        <p>《获麟操》，中国古琴曲，相传为孔子所作。一名《谨微》并收录在在《西麓堂琴统》中。相传为孔子所做，《获麟》原谱最早出现于《神奇秘谱》。</p>
                        <a href="news-list.html" class="news-list">查看详情</a>
                    </div>
                    <div class="news-text">
                        <div class="item">
                            <div class="news-text-time">
                                <h4>06</h4>
                                <h5>2017-06-27</h5>
                            </div>
                            <div class="news-text-contain">
                                <h2>李祥霆 古琴教学平沙落雁讲解</h2>
                                <p>琴院致力于古琴文化推广与交流，是集古琴教学、研究、培训、雅集、演出、斫琴、古琴销售服务，为一体的艺术机构。</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="news-text-time">
                                <h4>06</h4>
                                <h5>2017-06-27</h5>
                            </div>
                            <div class="news-text-contain">
                                <h2>李祥霆 古琴教学平沙落雁讲解</h2>
                                <p>琴院致力于古琴文化推广与交流，是集古琴教学、研究、培训、雅集、演出、斫琴、古琴销售服务，为一体的艺术机构。</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="news-text-time">
                                <h4>06</h4>
                                <h5>2017-06-27</h5>
                            </div>
                            <div class="news-text-contain">
                                <h2>李祥霆 古琴教学平沙落雁讲解</h2>
                                <p>琴院致力于古琴文化推广与交流，是集古琴教学、研究、培训、雅集、演出、斫琴、古琴销售服务，为一体的艺术机构。</p>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="news-img">
                        <div class="img"><img src="img/banner-home3.jpg"/></div>
                        <h1>金润一演奏《获麟操》李祥霆大师指导</h1>
                        <p>《获麟操》，中国古琴曲，相传为孔子所作。一名《谨微》并收录在在《西麓堂琴统》中。相传为孔子所做，《获麟》原谱最早出现于《神奇秘谱》。</p>
                        <a href="news-list.html" class="news-list">查看详情</a>
                    </div>
                    <div class="news-text">
                        <div class="item">
                            <div class="news-text-time">
                                <h4>06</h4>
                                <h5>2017-06-27</h5>
                            </div>
                            <div class="news-text-contain">
                                <h2>李祥霆 古琴教学平沙落雁讲解</h2>
                                <p>琴院致力于古琴文化推广与交流，是集古琴教学、研究、培训、雅集、演出、斫琴、古琴销售服务，为一体的艺术机构。</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="news-text-time">
                                <h4>06</h4>
                                <h5>2017-06-27</h5>
                            </div>
                            <div class="news-text-contain">
                                <h2>李祥霆 古琴教学平沙落雁讲解</h2>
                                <p>琴院致力于古琴文化推广与交流，是集古琴教学、研究、培训、雅集、演出、斫琴、古琴销售服务，为一体的艺术机构。</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="news-text-time">
                                <h4>06</h4>
                                <h5>2017-06-27</h5>
                            </div>
                            <div class="news-text-contain">
                                <h2>李祥霆 古琴教学平沙落雁讲解</h2>
                                <p>琴院致力于古琴文化推广与交流，是集古琴教学、研究、培训、雅集、演出、斫琴、古琴销售服务，为一体的艺术机构。</p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="news-main-btn">
                <div>
                    <div class="news-main-btn-l"><span class="iconfont icon-arrowL"></span></div>
                    <div class="news-main-btn-r"><span class="iconfont icon-arrowR"></span></div>
                </div>
                <a href="news.html">查看更多</a>
            </div>
        </div>
    </div>
</div>
<div class="baoming"><img src="img/baoming.jpg"/></div>
<div class="sign">
    <div class="wrap">
        <div class="sign-text">
            <div class="home-title">
                <h1>报名方式</h1>
                <span></span>
            </div>
            <h2>不同的国学项目各有特点，除了在线报名外，报名方式还有三种：</h2>
            <p>1、电话报名，即学生通过招生电话，联系对应国学项目负责人进行报名</p>
            <p>2、微信报名，即学生通过招生微信 ，联系对应国学项目负责人进行报名</p>
            <p>3.、到校报名，即学生直接到达校区 ，找到对应国学项目报名区，报名即可。</p>
            <h2>咨询热线：</h2>
            <h2>010-67906868</h2>
            <h2>招生老师：</h2>
            <h2>杜老师：010-67906868转606</h2>
            <h2>李老师：010-67906868转606</h2>
        </div>
        <div class="sign-form">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">您的姓名</label>
                    <div class="col-sm-8">
                        <input type="input" id="name" class="form-control" maxlength="5">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">联系方式</label>
                    <div class="col-sm-8">
                        <input type="input" class="form-control" id="phone" maxlength="20">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">是否学过琴</label>
                    <div class="col-sm-8">
                        <label class="radio-inline">
                            <input type="radio" name="yasNo"  value="yas"> 是
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="yasNo"  value="no"> 否
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">学习程度</label>
                    <div class="col-sm-8">
                        <label class="radio-inline">
                            <input type="radio" name="degree"  value="yas"> 没有学习过
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="degree"  value="no"> 一般
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="degree"  value="yas"> 想系统学习
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">期望老师</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" rows="4" style="resize: none;"></textarea>
                    </div>
                </div>
                <div class="sign-form-btn"><button type="button" class="btn">提交</button></div>
            </form>
        </div>
    </div>
</div>
<div class="icon-link">
    <ul>
        <li>
            <a href="#">
                <div class="icon-link-main">
                    <div class="icon-link-main-img"><img src="img/icon-link1.png"/></div>
                    <div class="icon-link-main-text">
                        <h4>伏羲帮助</h4>
                        <h5>Fu Xi help</h5>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="experience.html">
                <div class="icon-link-main">
                    <div class="icon-link-main-img"><img src="img/icon-link2.png"/></div>
                    <div class="icon-link-main-text">
                        <h4>伏羲体验</h4>
                        <h5>Fu Xi experience</h5>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="icon-link-main">
                    <div class="icon-link-main-img"><img src="img/icon-link3.png"/></div>
                    <div class="icon-link-main-text">
                        <h4>校区环境</h4>
                        <h5>Campus environment</h5>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="icon-link-main">
                    <div class="icon-link-main-img"><img src="img/icon-link4.png"/></div>
                    <div class="icon-link-main-text">
                        <h4>品牌关注</h4>
                        <h5>Brand concern</h5>
                    </div>
                </div>
            </a>
        </li>
    </ul>
</div>
