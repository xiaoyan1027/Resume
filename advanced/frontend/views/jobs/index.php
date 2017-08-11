<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<div class="pictureplace">
    <div class="pictureplacecenter">
        <img src="jobs/images/commonbanner.jpg?v=634507909375300000" />
    </div>
</div>
<div class="contain joblist clearfix">
    <div class="containsidebar">
        <!--module:positioncategory begin-->
        <div class="bs-module">
            <div class="positioncategory-smallfresh ">
                <div class="zhiweifenlei bodertop">
                    <div class="parttitleline"></div>
                    <div class="parttitle height0">
                        <span class="fenleiico"></span>
                        <div class="wordtitle lh0" title="职位类型">
                            职位类型
                        </div>
                    </div>
                    <div class="fenleilist">
                        <ul class="firstlist clearfix">
                            <li><a href="jobs.html?p=1^20#jlt" constval="20" title="北京">北京</a></li>
                            <li><a href="jobs.html?p=1^9#jlt" constval="9" title="上海">上海</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--module:positioncategory end-->
        <div class="zhaopindongtai bodertop">
            <!--module:newslist begin-->
            <div class="bs-module">
                <div class="newslist-newsimple ">
                    <div class="parttitleline"></div>
                    <div class="parttitle">
                        <span class="dongtaiico"></span>
                        <div class="wordtitle">
                            招聘动态
                        </div>
                    </div>
                    <a href="news.html" class="morelinks">更多&gt;&gt;</a>
                    <div class="dongtailinks">
                        <ul>
                            <li><a href="news_detail.html?110000085" title="51Talk最嗨实习岗来啦~快来一起嗨" target="_blank">51Talk最嗨实习岗来...</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--module:newslist end-->
        </div>
    </div>
    <div class="clearfix sousuocontain fl">
        <!--module:positionsearch begin-->
        <div class="bs-module">
            <div class="positionsearch-smallfresh ">
                <a name="jlt"></a>
                <div class="zhiweisousuo bodertop">
                    <div class="parttitleline"></div>
                    <div class="parttitle">
                        <span class="serchico"></span>
                        <div class="wordtitle">
                            职位搜索
                        </div>
                    </div>
                    <div class="serchcontain">
                        <input type="hidden" name="p" value="" id="jobAdClassHidden" />
                        <input type="hidden" name="p" value="" id="jobAdClassHidden" />
                        <input type="hidden" name="p" value="" id="jobAdClassHidden" />
                        <input type="hidden" name="p" value="" id="jobAdClassHidden" />
                        <input type="hidden" name="p" value="" id="jobAdClassHidden" />
                        <input type="hidden" name="p" value="" id="jobAdClassHidden" />
                        <div id="sous">
                        <table class="jobserch">
                            <tbody>
                            <form action="?r=jobs/index" method="post">
                            <tr class="serchjob">
                                <td class="listtitle">工作地点：</td>
                                <td>
                                    <select name="address" id="address" >

                                    <option value="0">请选择</option>
                                    <option value="北京">北京</option>
                                    <option value="上海">上海</option>
                                    <option value="广州">广州</option>
                                    <option value="运城">运城</option>
                                    <option value="葫芦岛">葫芦岛</option>

                                    </select>
                                 </td>

                            </tr>
                            <input type="hidden" name="p" value="" id="jobAdClassHidden" />
                            <input type="hidden" name="p" value="" id="jobAdClassHidden" />
                            
                            
                            
                            <tr class="serchjob">
                                <td class="listtitle"></td>
                                <td> <input type="text" class="serchinput" maxlength="50" id="name" name="names"  /><span class="serchbtn"><input type="submit" value="搜索"  /></span></td>
                            </tr>
                            </form>
                            </tbody>
                        </table>
                    </div>
                </div>
                <script type="text/javascript" src="../jquery.1.12.js"></script>
                <script type="text/javascript">
                    function GetParam(key) {
                        return (document.location.search.match(new RegExp("(?:^\\?|&)" + key + "=(.*?)(?=&|$)")) || ['', null])[1];
                    }

                    function myHTMLEnCode(str) {
                        var s = "";
                        if (str.length == 0) return "";
                        s = str.replace(/&/g, "&");
                        s = s.replace(/</g, "<");
                        s = s.replace(/>/g, ">");
                        s = s.replace(/ /g, "&nbsp;");
                        s = s.replace(/\'/g, "&#39;");

                        s = s.replace(/\n/g, "<br>");
                        return s;
                    }

                    function myHTMLDeCode(str) {
                        var s = "";
                        if (str.length == 0) return "";
                        s = str.replace(/&/g, "&");
                        s = s.replace(/</g, "<");
                        s = s.replace(/>/g, ">");
                        s = s.replace(/&nbsp;/g, " ");
                        s = s.replace(/&#39;/g, "\'");
                        s = s.replace(/"/g, "\"");
                        s = s.replace(/<br>/g, "\n");
                        return s;
                    }

                    var defaultText = "请输入关键字";

                    $(document).ready(function () {
                        $("input[name='keyword']").click(function () {
                            $(this).val("");
                        });

                        var keyWord = GetParam("k");

                        if (keyWord != null) {
                            keyWord = decodeURIComponent(keyWord);
                            keyWord = myHTMLDeCode(keyWord);

                            $("input[name='k']").val(keyWord);
                        }

                        $("#searchlink").click(function () {
                            var r = GetParam("r");
                            r = (r == null ? -1 : r);
                            var p = GetParam("p");
                            p = (p == null ? "" : p);
                            var c = GetParam("c");
                            c = (c == null ? "" : c);
                            var d = GetParam("d");
                            d = (d == null ? "" : d);
                            var k = $("input[name='k']").val();

                            if (k == defaultText)
                                k = "";

                            k = myHTMLEnCode(k);
                            k = encodeURIComponent($.trim(k));
                            location.href ="?r=jobs/search" + r + "&p=" + p + "&c=" + c + "&d=" + d + "&k=" + k + '#jlt';
                        });

                        var keyStr = $("#k").val();
                        if (!keyStr || keyStr == "") {
                            $("#k").css("color", "#d2cece");
                            $("#k").val(defaultText);
                        }

                        $("#k").focus(function () {
                            var v = $(this).val();
                            if (v == defaultText) {
                                $(this).val("");
                                $(this).css("color", "");
                            }
                        });

                        $("#k").blur(function () {
                            var v = $(this).val();
                            if (!v || v == "") {
                                $(this).val(defaultText);
                                $(this).css("color", "#d2cece");
                            }
                        });

                    });
                </script>
            </div>
        </div>
        <!--module:positionsearch end-->
        <!--module:positionlist begin-->
        <div class="bs-module">
            <div class="positionlist-newtemplate ">
                <div class="clearfix tablecontain">
               
                    <table class="listtable">
                        <thead>
                        <tr class="tabletitle">
                            <th class="tableleft">&nbsp;&nbsp;职位名称</th>
                            <th class="tableleft" title="职位类型">职位类型</th>
                            <th class="tableleft">工作地点</th>
                            <th class="tableleft">发布时间</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                         
                        <?php foreach($arr as $k=>$v){?>
                        <tr>
                            <td class="tableleft joblsttitle"> <?php echo $v['name']?><a title="市场运营" jobadid="620021669" href="detail.html?620021669">  </a> </td>
                            <td class="tableleft joblsttitle" title="青少事业部"><?php echo $v['type']?></td>
                            <td title="北京市" class="tableleft joblsttitle">  <?php echo $v['address']?></td>
                            <td class="tableleft joblsttitle">  <?php echo $v['time']?></td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>

                    <?php
                            echo LinkPager::widget([
                                'pagination'=>$pagination,
                                'nextPageLabel'=>'下一页',
                                'firstPageLabel'=>'首页'
                            ])
                    ?>
                       
                    </div>


                   


                    <!-- <span class="tablenote">共276条记录</span> -->
                    <div class="tablefooter">
                       
                        <script language="javascript" type="text/javascript">function _MvcPager_Keydown(e){var _kc,_pib;if(window.event){_kc=e.keyCode;_pib=e.srcElement;}else if(e.which){_kc=e.which;_pib=e.target;}var validKey=(_kc==8||_kc==46||_kc==37||_kc==39||(_kc>=48&&_kc<=57)||(_kc>=96&&_kc<=105));if(!validKey){if(_kc==13){ _MvcPager_GoToPage(_pib,19);}if(e.preventDefault){e.preventDefault();}else{event.returnValue=false;}}}function _MvcPager_GoToPage(_pib,_mp){var pageIndex;if(_pib.tagName=="SELECT"){pageIndex=_pib.options[_pib.selectedIndex].value;}else{pageIndex=_pib.value;var r=new RegExp("^\\s*(\\d+)\\s*$");if(!r.test(pageIndex)){alert("当前页码错误");return;}else if(RegExp.$1<1||RegExp.$1>_mp){alert("当前页码超出范围");return;}}var _hl=document.getElementById(_pib.id+'link').childNodes[0];var _lh=_hl.href;_hl.href=_lh.replace('=0','='+pageIndex);var evt=document.createEvent('MouseEvents');evt.initEvent('click',true,true);_hl.dispatchEvent(evt);_hl.href=_lh;}</script>
                        <div class="pager clearfix">
                            
                            <span id="_MvcPager_Ctrl0_piblink" style="display:none;width:0px;height:0px"><a href="jobs.html/?PageIndex=0" onclick="window.open(this.attributes.getNamedItem('href').value,'_self')"></a></span></span>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">

                    //职位学历映射
                    var jobAdEduMap = {
                        //        "244858631" : "高职高专",
                        //        "996726632" : "大学本科",
                        //        "208199123" : "硕士研究生",
                        //        "214287756": "博士研究生"

                        "244858631": "高职高专",
                        "996726632": "大学本科",
                        "208199123": "硕士研究生",
                        "214287756": "博士研究生"
                    }

                    //获取locationUrl判定是否需要获取额外添加的列
                    var url = window.location.href;

                    if (url.indexOf("cnnp.zhiye.com") > 0) {//域名
                        //获取列表第一列职位广告ID
                        var ids = [];
                        var jobTitles = $(".joblsttitle a ");
                        //循环获取HREF提取JobId
                        for (var i = 0; i < jobTitles.length; i++) {
                            //            var id = jobTitles[i].pathname.split("/")[2];
                            //            //点击标签后该Url携带其他条件，再次过滤
                            //            if (id.indexOf("?")) {
                            //                id = id.split("?")[0];
                            //            }
                            var id = $(jobTitles[i]).attr("jobadid");
                            ids.push(parseInt(id));
                        }

                        //判定列表中存在数据
                        if (ids.length > 0) {
                            $.ajax({
                                url: "/Extensions/Widget/GetJobAdditional",
                                data: {
                                    jobAdIds: ids.toString(),
                                    additionalKeys: "extA9000_102054_949224493" //extA900_100102_2063773255
                                },
                                type: "POST",
                                dataType: 'json'
                            }).done(function (resp) {
                                //添加学历列
                                $(".listtable thead .tabletitle th:eq(2)").before('<th class="tableleft">学历</th>');
                                var htmlMap = [];
                                for (var i = 0; i < ids.length; i++) {
                                    var map = { jobadid: ids[i], eduName: '' };
                                    for (var j = 0; j < resp.length; j++) {

                                        if (ids[i] == parseInt(resp[j].JobAdId)) {
                                            map.eduName = jobAdEduMap[resp[j].AdditionaList[0].AdditionaValue];
                                        }
                                    }
                                    htmlMap.push(map);
                                }
                                for (var o = 0; o < htmlMap.length; o++) {
                                    $(".joblsttitle a[jobadid='" + (htmlMap[o].jobadid || '') + "'] ").parent().parent().find("td:eq(2)").before('<td class="tableleft joblsttitle" title="' + htmlMap[o].eduName + '">' + htmlMap[o].eduName + '</td>');
                                }
                            });
                        }
                    }


                    // $("#searchlinks").click(function(){

                    //     var address = $("#address").val();
                    //     var type = $("#type").val();
                    //     var times = $("#times").val();
                    //     var types = $("#types").val();
                    //     var name = $("#name").val();

                    //     $.ajax({

                    //         type : "post",
                    //         data : "type="+type+"&address="+address+"&times="+times+"&types="+types+"&name="+name,
                    //         url : "?r=jobs/search",
                    //         dataType: "json",
                    //         var str="";
                    //         success : function(msg){
                            


                    //         }
                    //     });


                    // });




















                </script>


            </div>
        </div>
        <!--module:positionlist end-->
        <!--module:deliverystoredb begin-->
        <div class="bs-module">
            <div class="deliverystoredb-default ">
            </div>
        </div>
        <!--module:deliverystoredb end-->
    </div>
</div>