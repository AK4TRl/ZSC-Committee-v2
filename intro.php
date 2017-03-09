<?php

require('setup.php');

header("Content-type: text/html; charset=utf-8");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = isset($_GET['id']) ? $_GET['id'] : 1;
    $part = null;
    switch ($id) {
        case 1:
            $part = array(
                'name' => '指导老师',
                'summary' => '指导老师',
                'member' => array(
                    array(
                        'name' => '陈化水',
                        'class' => '',
                        'aca' => '',
                        'job' => '校团委书记',
                    ),
                    array(
                        'name' => '杨玉春',
                        'class' => '',
                        'aca' => '',
                        'job' => '校团委副书记',
                    )
                )
            );
            break;
        case 2:
            $part = array(
                'name' => '秘书处',
                'summary' => '结合校团委的实际情况，认真传达党组织和上级团组织的决议和指示；协助团委书记做好校团委的工作计划、决议的执行等；检查、监督并帮助各部门做好分管工作；指导和帮助各学生组织及二级学院团委开展工作；负责上级团委接待工作。',
                'member' => array(
                    array(
                        'name' => '黄泳健',
                        'class' => '13机械',
                        'aca' => '机电工程学院',
                        'job' => '校团委秘书长',
                        'img' => 'asset/image/intro/default.jpg'
                    ),
                    array(
                        'name' => '岑己坤',
                        'class' => '14游戏开发',
                        'aca' => '计算机学院',
                        'job' => '校团委副秘书长',
                        'img' => 'asset/image/intro/秘书处/岑己坤.jpg'
                    ),
                    array(
                        'name' => '林志远',
                        'class' => '14生技',
                        'aca' => '材料与食品学院',
                        'job' => '校团委副秘书长',
                        'img' => 'asset/image/intro/秘书处/林志远.jpg'
                    ),
                    array(
                        'name' => '冯俊岭',
                        'class' => '14通信',
                        'aca' => '电子信息学院',
                        'job' => '校团委副秘书长',
                        'img' => 'asset/image/intro/秘书处/冯俊岭.jpg'
                    ),
                )
            );
            break;
        case 3:
            $part = array(
                'name' => '办公室',
                'summary' => '负责办公室的管理、物资的采购、保管，活动经费的汇总和报销；负责团委干部及干事的考核；负责各类文件及材料起草，文件资料收发登记、立卷、归档；负责团委各类会务工作。负责制作校团委和二级学院主要学生干部通讯录，加强校院两级沟通与交流。',
                'member' => array(
                    array(
                        'name' => '蔡文立',
                        'class' => '14电气',
                        'aca' => '机电工程学院',
                        'job' => '办公室主任',
                        'img' => 'asset/image/intro/办公室/蔡文立.jpg'
                    ),
                    array(
                        'name' => '谷颖',
                        'class' => '14法学',
                        'aca' => '人文社会科学学院',
                        'job' => '办公室主任',
                        'img' => 'asset/image/intro/办公室/谷颖.jpg'
                    ),
                    array(
                        'name' => '陈文广',
                        'class' => '15嵌入',
                        'aca' => '计算机学院',
                        'job' => '办公室委员',
                        'img' => 'asset/image/intro/办公室/陈文广.jpg'
                    ),
                    array(
                        'name' => '段天宇',
                        'class' => '15电气',
                        'aca' => '机电工程学院',
                        'job' => '办公室委员',
                        'img' => 'asset/image/intro/办公室/段天宇.jpg'
                    ),
                    array(
                        'name' => '刘培新',
                        'class' => '15通信',
                        'aca' => '电子信息学院',
                        'job' => '办公室委员',
                        'img' => 'asset/image/intro/办公室/刘培新.jpg'
                    ),
                    array(
                        'name' => '彭晓明',
                        'class' => '15软开',
                        'aca' => '计算机学院',
                        'job' => '办公室委员',
                        'img' => 'asset/image/intro/办公室/彭晓明.jpg'
                    ),
                    array(
                        'name' => '舒丹',
                        'class' => '15电科',
                        'aca' => '电子信息学院',
                        'job' => '办公室委员',
                        'img' => 'asset/image/intro/办公室/舒丹.jpg'
                    ),
                    array(
                        'name' => '谭思绮',
                        'class' => '15金融',
                        'aca' => '经贸学院',
                        'job' => '办公室委员',
                        'img' => 'asset/image/intro/办公室/谭思绮.jpg'
                    ),
                    array(
                        'name' => '吴婉淇',
                        'class' => '15财管',
                        'aca' => '管理学院',
                        'job' => '办公室委员',
                        'img' => 'asset/image/intro/办公室/吴婉淇.jpg'
                    ),
                    array(
                        'name' => '徐姿爽',
                        'class' => '15电科',
                        'aca' => '电子信息学院',
                        'job' => '办公室委员',
                        'img' => 'asset/image/intro/办公室/徐姿爽.jpg'
                    ),
                    array(
                        'name' => '杨佳曼',
                        'class' => '15日语',
                        'aca' => '外国语学院',
                        'job' => '办公室委员',
                        'img' => 'asset/image/intro/办公室/杨佳曼.jpg'
                    ),
                    array(
                        'name' => '叶秀清',
                        'class' => '15环境工程',
                        'aca' => '材料与食品学院',
                        'job' => '办公室委员',
                        'img' => 'asset/image/intro/办公室/叶秀清.jpg'
                    ),
                    array(
                        'name' => '张悦',
                        'class' => '15环境工程',
                        'aca' => '材料与食品学院',
                        'job' => '办公室委员',
                        'img' => 'asset/image/intro/办公室/张悦.jpg'
                    ),
                    array(
                        'name' => '马时霖',
                        'class' => '15通信环境工程',
                        'aca' => '材料与食品学院',
                        'job' => '办公室委员',
                        'img' => 'asset/image/intro/办公室/马时霖.jpg'
                    ),
                    array(
                        'name' => '倪美茵',
                        'class' => '15财管',
                        'aca' => '管理学院',
                        'job' => '办公室委员',
                        'img' => 'asset/image/intro/办公室/倪美茵.jpg'
                    ),
                )
            );
            break;
        case 4:
            $part = array(
                'name' => '宣传部',
                'summary' => '正确贯彻党的宣传方针政策，抓好思想政治教育及文化建设阵地；负责对宣传栏海报、横幅等宣传张贴物品的回收及管理管理，认真保管与使用宣传物品，坚持厉行节约的原则工作；负责编辑出版校刊《青年》，同时检查监督我校各学生组织刊物的出版与发表；对校团委各项活动进行活动跟踪及新闻稿撰写报道，及时维护更新和监控校团委网站和微博；负责收集各二级学院和学生组织活动新闻，及时上传到校团委网站。',
                'member' => array(
                    array(
                        'name' => '李嘉琦',
                        'class' => '14行管',
                        'aca' => '人文社会科学学院',
                        'job' => '宣传部部长',
                        'img' => 'asset/image/intro/宣传部/李嘉琦.jpg'
                    ),
                    array(
                        'name' => '郭非凡',
                        'class' => '14机械',
                        'aca' => '机电学院',
                        'job' => '宣传部部长',
                        'img' => 'asset/image/intro/宣传部/郭非凡.jpg'
                    ),
                    array(
                        'name' => '肖祖琪',
                        'class' => '15会展',
                        'aca' => '人文社会科学学院',
                        'job' => '宣传部委员',
                        'img' => 'asset/image/intro/宣传部/肖祖琪.jpg'
                    ),
                    array(
                        'name' => '田玉',
                        'class' => '15软开',
                        'aca' => '计算机学院',
                        'job' => '宣传部委员',
                        'img' => 'asset/image/intro/宣传部/田玉.jpg'
                    ),
                    array(
                        'name' => '李臻臻',
                        'class' => '15英语',
                        'aca' => '外国语学院',
                        'job' => '宣传部委员',
                        'img' => 'asset/image/intro/宣传部/李臻臻.jpg'
                    ),
                    array(
                        'name' => '林诗圳',
                        'class' => '15会展',
                        'aca' => '人文社会科学学院',
                        'job' => '宣传部委员',
                        'img' => 'asset/image/intro/宣传部/林诗圳.jpg'
                    ),
                    array(
                        'name' => '郭浩桦',
                        'class' => '15金融',
                        'aca' => '经贸学院',
                        'job' => '宣传部委员',
                        'img' => 'asset/image/intro/宣传部/郭浩桦.jpg'
                    ),
                    array(
                        'name' => '王甲欣',
                        'class' => '15法学',
                        'aca' => '人文社会科学学院',
                        'job' => '宣传部委员',
                        'img' => 'asset/image/intro/宣传部/王甲欣.jpg'
                    ),
                    array(
                        'name' => '蔡馥蔚',
                        'class' => '15金融',
                        'aca' => '经贸学院',
                        'job' => '宣传部委员',
                        'img' => 'asset/image/intro/宣传部/蔡馥蔚.jpg'
                    ),
                    array(
                        'name' => '蔡锐苑',
                        'class' => '15电科',
                        'aca' => '电信工程学院',
                        'job' => '宣传部委员',
                        'img' => 'asset/image/intro/宣传部/蔡锐苑.jpg'
                    ),
                    array(
                        'name' => '张志欣',
                        'class' => '15法学',
                        'aca' => '人文社会科学学院',
                        'job' => '宣传部委员',
                        'img' => 'asset/image/intro/宣传部/张志欣.jpg'
                    ),
                    array(
                        'name' => '支绍卓',
                        'class' => '15嵌入',
                        'aca' => '计算机学院',
                        'job' => '宣传部委员',
                        'img' => 'asset/image/intro/宣传部/支绍卓.jpg'
                    ),
                )
            );
            break;
        case 5:
            $part = array(
                'name' => '组织部',
                'summary' => '负责团干、团员统计，建立和管理团员干部档案，负责团费收缴、团员注册、团证补办、团组织关系的转接工作，发展新团员；督促支部过好组织生活，对各班团支部组织生活、团队活动的指导和评估；审查入党积极分子材料，推荐优秀团员作为党的发展对象；协助学校组织人事处开办团课；定期组织团干部培训；协助团委书记做好团内评奖评优工作。',
                'member' => array(
                    array(
                        'name' => '丘晓妍',
                        'class' => '14法学',
                        'aca' => '人文社会科学学院',
                        'job' => '组织部部长',
                        'img' => 'asset/image/intro/组织部/丘晓妍.jpg'
                    ),
                    array(
                        'name' => '李灿娜',
                        'class' => '14英翻',
                        'aca' => '外国语学院',
                        'job' => '组织部部长',
                        'img' => 'asset/image/intro/组织部/李灿娜.jpg'
                    ),
                    array(
                        'name' => '梁旭儿',
                        'class' => '15材料化学',
                        'aca' => '材料与食品学院',
                        'job' => '组织部委员',
                        'img' => 'asset/image/intro/组织部/梁旭儿.jpg'
                    ),
                    array(
                        'name' => '丁骏鹏',
                        'class' => '15嵌入',
                        'aca' => '计算机学院',
                        'job' => '组织部委员',
                        'img' => 'asset/image/intro/组织部/丁骏鹏.jpg'
                    ),
                    array(
                        'name' => '廖梓铭',
                        'class' => '15数字化',
                        'aca' => '机电工程学院',
                        'job' => '组织部委员',
                        'img' => 'asset/image/intro/组织部/廖梓铭.jpg'
                    ),
                    array(
                        'name' => '钟德生',
                        'class' => '15嵌入',
                        'aca' => '计算机学院',
                        'job' => '组织部委员',
                        'img' => 'asset/image/intro/组织部/钟德生.jpg'
                    ),
                    array(
                        'name' => '居天树',
                        'class' => '15嵌入',
                        'aca' => '计算机学院',
                        'job' => '组织部委员',
                        'img' => 'asset/image/intro/组织部/居天树.jpg'
                    ),
                    array(
                        'name' => '杨怡祺',
                        'class' => '15物流',
                        'aca' => '管理学院',
                        'job' => '组织部委员',
                        'img' => 'asset/image/intro/组织部/杨怡祺.jpg'
                    ),
                    array(
                        'name' => '沈阳',
                        'class' => '15电气',
                        'aca' => '机电工程学院',
                        'job' => '组织部委员',
                        'img' => 'asset/image/intro/组织部/沈阳.jpg'
                    ),
                    array(
                        'name' => '刘康铭',
                        'class' => '15法学',
                        'aca' => '人文社会科学学院',
                        'job' => '组织部委员',
                        'img' => 'asset/image/intro/组织部/刘康铭.jpg'
                    ),
                    array(
                        'name' => '黄雅贤',
                        'class' => '15应化',
                        'aca' => '材料与食品学院',
                        'job' => '组织部委员',
                        'img' => 'asset/image/intro/组织部/黄雅贤.jpg'
                    ),
                    array(
                        'name' => '梁剑萍',
                        'class' => '15财管',
                        'aca' => '管理学院',
                        'job' => '组织部委员',
                        'img' => 'asset/image/intro/组织部/梁剑萍.jpg'
                    ),
                    array(
                        'name' => '林月贵',
                        'class' => '15物流',
                        'aca' => '管理学院',
                        'job' => '组织部委员',
                        'img' => 'asset/image/intro/组织部/林月贵.jpg'
                    ),
                    array(
                        'name' => '梁颖欣',
                        'class' => '15新闻',
                        'aca' => '人文社会科学学院',
                        'job' => '组织部委员',
                        'img' => 'asset/image/intro/组织部/梁颖欣.jpg'
                    ),
                    array(
                        'name' => '李常绿',
                        'class' => '15工管',
                        'aca' => '管理学院',
                        'job' => '组织部委员',
                        'img' => 'asset/image/intro/组织部/李常绿.jpg'
                    ),
                )
            );
            break;
        case 6:
            $part = array(
                'name' => '实践部',
                'summary' => '负责组织全校性的社会实践活动和社会公益活动；负责学校重大活动的外联工作；负责全校大学生寒、暑假社会实践活动项目审核、成果交流、评优评奖工作；指导全校实践部门的整体活动，检查督促各学院开展具有专业特色的社会实践活动；积极联系政府或企业，为大学生提供社会实践机会，并在企业或外校进行大学生之间的交流活动；负责大学生素质拓展认证工作。',
                'member' => array(
                    array(
                        'name' => '谭宛诗',
                        'class' => '14法学',
                        'aca' => '化学与生物工程学院',
                        'job' => '实践部部长',
                        'img' => 'asset/image/intro/实践部/谭宛诗.jpg'
                    ),
                    array(
                        'name' => '廖柳坤',
                        'class' => '14电气',
                        'aca' => '机电工程学院',
                        'job' => '实践部部长',
                        'img' => 'asset/image/intro/实践部/廖柳坤.jpg'
                    ),
                    array(
                        'name' => '郑泽生',
                        'class' => '15电商',
                        'aca' => '经贸学院',
                        'job' => '实践部委员',
                        'img' => 'asset/image/intro/实践部/郑泽生.jpg'
                    ),
                    array(
                        'name' => '许倍',
                        'class' => '15软开',
                        'aca' => '计算机学院',
                        'job' => '实践部委员',
                        'img' => 'asset/image/intro/实践部/许倍.jpg'
                    ),
                    array(
                        'name' => '范姚辉',
                        'class' => '15机械',
                        'aca' => '机电工程学院',
                        'job' => '实践部委员',
                        'img' => 'asset/image/intro/实践部/范姚辉.jpg'
                    ),
                    array(
                        'name' => '黄美君',
                        'class' => '15人管',
                        'aca' => '管理学院',
                        'job' => '实践部委员',
                        'img' => 'asset/image/intro/实践部/黄美君.jpg'
                    ),
                    array(
                        'name' => '何紫霞',
                        'class' => '15工管',
                        'aca' => '管理学院',
                        'job' => '实践部委员',
                        'img' => 'asset/image/intro/实践部/何紫霞.jpg'
                    ),
                    array(
                        'name' => '柳德华',
                        'class' => '15电气',
                        'aca' => '机电工程学院',
                        'job' => '实践部委员',
                        'img' => 'asset/image/intro/实践部/柳德华.jpg'
                    ),
                    array(
                        'name' => '邱鹏飞',
                        'class' => '15法学',
                        'aca' => '人文社会科学学院',
                        'job' => '实践部委员',
                        'img' => 'asset/image/intro/实践部/邱鹏飞.jpg'
                    ),
                    array(
                        'name' => '杜展桦',
                        'class' => '15金融',
                        'aca' => '经贸学院',
                        'job' => '实践部委员',
                        'img' => 'asset/image/intro/实践部/杜展桦.jpg'
                    ),
                    array(
                        'name' => '吴铿',
                        'class' => '15商英',
                        'aca' => '外国语学院',
                        'job' => '实践部委员',
                        'img' => 'asset/image/intro/实践部/吴铿.jpg'
                    ),
                    array(
                        'name' => '陈敏仪',
                        'class' => '15商英',
                        'aca' => '外国语学院',
                        'job' => '实践部委员',
                        'img' => 'asset/image/intro/实践部/陈敏仪.jpg'
                    ),
                    array(
                        'name' => '袁宇俊',
                        'class' => '15工管',
                        'aca' => '管理学院',
                        'job' => '实践部委员',
                        'img' => 'asset/image/intro/实践部/袁宇俊.jpg'
                    ),
                    array(
                        'name' => '何湄玲',
                        'class' => '15财管',
                        'aca' => '管理学院',
                        'job' => '实践部委员',
                        'img' => 'asset/image/intro/实践部/何湄玲.jpg'
                    ),
                    array(
                        'name' => '邓蕴皓',
                        'class' => '15通信',
                        'aca' => '电子信息学院',
                        'job' => '实践部委员',
                        'img' => 'asset/image/intro/实践部/邓蕴皓.jpg'
                    ),
                    array(
                        'name' => '杜煜祺',
                        'class' => '15机电',
                        'aca' => '机电工程学院',
                        'job' => '实践部委员',
                        'img' => 'asset/image/intro/实践部/杜煜祺.jpg'
                    ),
                    array(
                        'name' => '朱倩贝',
                        'class' => '15商英',
                        'aca' => '外国语学院',
                        'job' => '实践部委员',
                        'img' => 'asset/image/intro/实践部/朱倩贝.jpg'
                    ),
                )
            );
            break;
        case 7:
            $part = array(
                'name' => '调研部',
                'summary' => '承办校内、外各类科研竞赛、学科竞赛，认真做好校内“挑战杯”竞赛选拔工作；针对各部门开展的活动进行调研，为他们的工作提出可行的改进意见或建议；不定期进行专项调研，为学校相关部门解决学生反映的权益问题提供依据；处理各种来访投诉，代表学生与学校进行沟通，反映学生的要求与愿望，接受学生的反映意见和建议，呈送学校相关部门，并反馈处理的结果或者答复。',
                'member' => array(
                    array(
                        'name' => '林清滇',
                        'class' => '14新闻',
                        'aca' => '人文社会科学学院',
                        'job' => '调研部部长',
                        'img' => 'asset/image/intro/调研部/林清滇.jpg'
                    ),
                    array(
                        'name' => '郑展鹏',
                        'class' => '14电气',
                        'aca' => '机电工程学院',
                        'job' => '调研部部长',
                        'img' => 'asset/image/intro/调研部/郑展鹏.jpg'
                    ),
                    array(
                        'name' => '陈佳玲',
                        'class' => '14金融',
                        'aca' => '经贸学院',
                        'job' => '调研部委员',
                        'img' => 'asset/image/intro/调研部/陈佳玲.jpg'
                    ),
                    array(
                        'name' => '黄德墩',
                        'class' => '14会展',
                        'aca' => '人文社会科学学院',
                        'job' => '调研部委员',
                        'img' => 'asset/image/intro/调研部/黄德墩.jpg'
                    ),
                    array(
                        'name' => '黄钊华',
                        'class' => '14材化',
                        'aca' => '材料与食品学院',
                        'job' => '调研部委员',
                        'img' => 'asset/image/intro/调研部/黄钊华.jpg'
                    ),
                    array(
                        'name' => '林慕婵',
                        'class' => '14法学',
                        'aca' => '人文社会科学学院',
                        'job' => '调研部委员',
                        'img' => 'asset/image/intro/调研部/林慕婵.jpg'
                    ),
                    array(
                        'name' => '沈靖川',
                        'class' => '14电科',
                        'aca' => '电子信息学院',
                        'job' => '调研部委员',
                        'img' => 'asset/image/intro/调研部/沈靖川.jpg'
                    ),
                    array(
                        'name' => '谭燕青',
                        'class' => '14商英',
                        'aca' => '外国语学院',
                        'job' => '调研部委员',
                        'img' => 'asset/image/intro/调研部/谭燕青.jpg'
                    ),
                    array(
                        'name' => '吴浩鋆',
                        'class' => '14机电',
                        'aca' => '机电工程学院',
                        'job' => '调研部委员',
                        'img' => 'asset/image/intro/调研部/吴浩鋆.jpg'
                    ),
                    array(
                        'name' => '谢锴臻',
                        'class' => '14财管',
                        'aca' => '管理学院',
                        'job' => '调研部委员',
                        'img' => 'asset/image/intro/调研部/谢锴臻.jpg'
                    ),
                    array(
                        'name' => '叶基乐',
                        'class' => '14应化',
                        'aca' => '材料与食品学院',
                        'job' => '调研部委员',
                        'img' => 'asset/image/intro/调研部/叶基乐.jpg'
                    ),
                    array(
                        'name' => '曾君',
                        'class' => '14人管',
                        'aca' => '管理学院',
                        'job' => '调研部委员',
                        'img' => 'asset/image/intro/调研部/曾君.jpg'
                    ),
                    array(
                        'name' => '赵金海',
                        'class' => '14材化',
                        'aca' => '材料与食品学院',
                        'job' => '调研部委员',
                        'img' => 'asset/image/intro/调研部/赵金海.jpg'
                    ),
                    array(
                        'name' => '赵芝斌',
                        'class' => '14应化',
                        'aca' => '材料与食品学院',
                        'job' => '调研部委员',
                        'img' => 'asset/image/intro/调研部/赵芝斌.jpg'
                    ),
                    array(
                        'name' => '郑泽薇',
                        'class' => '14金融',
                        'aca' => '经贸学院',
                        'job' => '调研部委员',
                        'img' => 'asset/image/intro/调研部/郑泽薇.jpg'
                    ),
                    array(
                        'name' => '钟梓晓',
                        'class' => '14物流',
                        'aca' => '管理学院',
                        'job' => '调研部委员',
                        'img' => 'asset/image/intro/调研部/钟梓晓.jpg'
                    ),
                    array(
                        'name' => '李燕珊',
                        'class' => '14网络',
                        'aca' => '计算机学院',
                        'job' => '调研部委员',
                        'img' => 'asset/image/intro/调研部/李燕珊.jpg'
                    ),
                )
            );
            break;
        case 8:
            $part = array(
                'name' => '国旗部',
                'summary' => '主要负责每周的升旗护旗任务，校运会等大型活动的出旗任务，校内重大场合的礼宾工作，组织全校性爱国主义教育活动等。',
                'member' => array(
                    array(
                        'name' => '徐雷',
                        'class' => '14电气',
                        'aca' => '机电学院',
                        'job' => '国旗部部长',
                        'img' => 'asset/image/intro/国旗部/徐雷.jpg'
                    ),
                    array(
                        'name' => '陈梵玉',
                        'class' => '14嵌入',
                        'aca' => '计算机学院',
                        'job' => '国旗部部长',
                        'img' => 'asset/image/intro/国旗部/陈梵玉.jpg'
                    ),
                    array(
                        'name' => '陈创标',
                        'class' => '15环境工程',
                        'aca' => '材料与食品学院',
                        'job' => '国旗部委员',
                        'img' => 'asset/image/intro/国旗部/陈创标.jpg'
                    ),
                    array(
                        'name' => '胡捷敏',
                        'class' => '15生技',
                        'aca' => '材料与食品学院',
                        'job' => '国旗部委员',
                        'img' => 'asset/image/intro/国旗部/胡捷敏.jpg'
                    ),
                    array(
                        'name' => '黄泽佳',
                        'class' => '15工业设计',
                        'aca' => '艺术设计学院',
                        'job' => '国旗部委员',
                        'img' => 'asset/image/intro/国旗部/黄泽佳.jpg'
                    ),
                    array(
                        'name' => '黄中旭',
                        'class' => '15工管',
                        'aca' => '管理学院',
                        'job' => '国旗部委员',
                        'img' => 'asset/image/intro/国旗部/黄中旭.jpg'
                    ),
                    array(
                        'name' => '李广南',
                        'class' => '15电气',
                        'aca' => '机电工程学院',
                        'job' => '国旗部委员',
                        'img' => 'asset/image/intro/国旗部/李广南.jpg'
                    ),
                    array(
                        'name' => '李铭',
                        'class' => '15金融',
                        'aca' => '经贸学院',
                        'job' => '国旗部委员',
                        'img' => 'asset/image/intro/国旗部/李铭.jpg'
                    ),
                    array(
                        'name' => '梁晓文',
                        'class' => '15商英',
                        'aca' => '外国语学院',
                        'job' => '国旗部委员',
                        'img' => 'asset/image/intro/国旗部/梁晓文.jpg'
                    ),
                    array(
                        'name' => '林奕君',
                        'class' => '15环行管',
                        'aca' => '人文社会科学学院',
                        'job' => '国旗部委员',
                        'img' => 'asset/image/intro/国旗部/林奕君.jpg'
                    ),
                    array(
                        'name' => '彭凤梅',
                        'class' => '15财管',
                        'aca' => '管理学院',
                        'job' => '国旗部委员',
                        'img' => 'asset/image/intro/国旗部/彭凤梅.jpg'
                    ),
                    array(
                        'name' => '王子睿',
                        'class' => '15财管',
                        'aca' => '管理学院',
                        'job' => '国旗部委员',
                        'img' => 'asset/image/intro/国旗部/王子睿.jpg'
                    ),
                    array(
                        'name' => '苑璞',
                        'class' => '15物流',
                        'aca' => '管理学院',
                        'job' => '国旗部委员',
                        'img' => 'asset/image/intro/国旗部/苑璞.jpg'
                    ),
                )
            );
            break;
        case 9:
            $part = array(
                'name' => '礼仪队',
                'summary' => '负责学校内外各类大型活动（如庆典活动、大型赛事、表彰大会、各类仪式等的礼仪工作）。',
                'member' => array(
                    array(
                        'name' => '毛岳邦',
                        'class' => '14产品设计',
                        'aca' => '艺术设计学院',
                        'job' => '礼仪队队长',
                        'img' => 'asset/image/intro/礼仪队/毛岳邦.jpg'
                    ),
                    array(
                        'name' => '曹可勉',
                        'class' => '14金融',
                        'aca' => '经贸学院',
                        'job' => '礼仪队副队长',
                        'img' => 'asset/image/intro/礼仪队/曹可勉.jpg'
                    ),
                    array(
                        'name' => '黄心怡',
                        'class' => '14金融',
                        'aca' => '经贸学院',
                        'job' => '礼仪队副队长',
                        'img' => 'asset/image/intro/礼仪队/黄心怡.jpg'
                    ),
                )
            );
            break;
        case 10:
            $part = array(
                'name' => '广播台',
                'summary' => '负责收集各类影像视材，制作影像视频；负责校园广播节目、新闻资讯以及学校各学院或组织的通知、公告等；在传达学校及团委大政方针的同时，追踪世界实事动态、社会焦点关注，及时反映校园热点话题，展现学生精神风采。',
                'member' => array(
                    array(
                        'name' => '黄锦斌',
                        'class' => '13网络通信',
                        'aca' => '计算机学院',
                        'job' => '广播台台长',
                        'img' => 'asset/image/intro/广播台/黄锦斌.jpg'
                    )
                )
            );
            break;
    }
    $smarty->assign('part', $part);
}

$smarty->display('intro.tpl');