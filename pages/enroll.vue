<template>
<div>
        <div class="sticky top-0 pt-6 grid grid-flow-row justify-center topbar-background">
            <div class="font-sans text-3xl antialiased text-center">填写报名表</div>
            <div class="font-sans antialiased text-center py-2 mb-3">填写个人信息进行登记</div>
        </div>
        <div>
            <main class="container mx-auto">
                <div class="grid grid-cols-1 m-2">
                    <div class="font-sans antialiased text-grey-400 font-medium text-left py-1 mt-1 mx-4">真实姓名</div>
                    <input class="input-item" placeholder="李晓明" type="text" v-model="realName" required/>
                    <div class="font-sans antialiased text-grey-400 font-medium text-left py-1 mt-1 mx-4">学号</div>
                    <input class="input-item" placeholder="2100000001" type="text" v-model="stuId" required/>
                    <div class="font-sans antialiased text-grey-400 font-medium text-left py-1 mt-1 mx-4">电话号码</div>
                    <input class="input-item" placeholder="13600000005" type="text" v-model="phoneNumber" required/>
                    <div class="font-sans antialiased text-grey-400 font-medium text-left py-1 mt-1 mx-4">QQ号码</div>
                    <input class="input-item" placeholder="123456789" type="text" v-model="qqNumber" required/>
                    <div class="font-sans antialiased text-grey-400 font-medium text-left py-1 mt-1 mx-4">校区</div>
                    <select class="input-item" v-model="region">
                        <option value="qz">泉州校区</option>
                        <option value="xm">厦门校区</option>
                        <option value="hw">龙舟池校区</option>
                    </select>
                    <div class="font-sans antialiased text-grey-400 font-medium text-left py-1 mt-1 mx-4">学院</div>
                    <select class="input-item" v-model="institute">
                        <option>请选择学院</option>
                        <option>机电及自动化学院</option>
                        <option>土木工程学院</option>
                        <option>建筑学院</option>
                        <option>材料科学与工程学院</option>
                        <option>信息科学与工程学院</option>
                        <option>工商管理学院</option>
                        <option>法学院</option>
                        <option>文学院</option>
                        <option>外国语学院</option>
                        <option>美术学院</option>
                        <option>数学科学学院</option>
                        <option>公共管理学院</option>
                        <option>旅游学院</option>
                        <option>经济与金融学院</option>
                        <option>计算机科学与技术学院</option>
                        <option>化工学院</option>
                        <option>哲学与社会发展学院</option>
                        <option>马克思主义学院</option>
                        <option>国际学院</option>
                        <option>体育学院</option>
                        <option>其他类型境外生</option>
                        <option>工学院</option>
                        <option>音乐舞蹈学院</option>
                        <option>华文学院</option>
                        <option>医学院</option>
                        <option>厦航学院</option>
                        <option>国际关系学院</option>
                        <option>统计学院</option>
                        <option>新闻与传播学院</option>
                        <option>创新创业学院</option>
                    </select>
                    <div class="font-sans antialiased text-grey-400 font-medium text-left py-1 mt-1 mx-4">专业</div>
                    <input class="input-item" placeholder="e.g.20计算机类" type="text" v-model="major" required/>
                    <div class="font-sans antialiased text-grey-400 font-medium text-left py-1 mt-1 mx-4">点选你想加入的部门（1-2个）</div>
                    <div class="grid grid-cols-5">
                        <div class="bg-gray-100 rounded-lg transition grid grid-rows-2 justify-items-center my-1 mx-2 p-2 pb-1 sm:p-1 sm:mx-1 px-0" v-for="item in deplist" @click="choosedep(item)" :class="choose_dep.indexOf(item)==-1?'bg-gray-100':'bg-blue-500'">
                            <div :class="choose_dep.indexOf(item)==-1?'':'text-white'">{{item}}</div>
                            <div :class="choose_dep.indexOf(item)==-1?'text-gray-400':'text-blue-300'" class="text-xs">{{choose_dep.indexOf(item)==-1?'未选择':('第'+ (choose_dep.indexOf(item)+1)+"选项")}}</div>
                            </div>
                    </div>
                    <div class="font-sans antialiased text-grey-400 font-medium text-left py-1 mt-1 mx-4">个人简介</div>
                    <textarea  class="input-item resize-y" placeholder="个人能力、兴趣等...（拖动右下角可调节大小）" maxlength=500 type="text" v-model="selfIntroduce" ></textarea>
                    <div class="bg-blue-500 rounded-xl shadow-md transition flex flex-grow auto-cols-auto items-center mt-4 my-2 mx-2 pl-4 p-2 sm:p-1 sm:pl-2 sm:mx-1 justify-self-stretch"><img src="/app-icon/advices.png" class="h-8 w-8 sm:h-6 sm:w-6" />
                        <div class="quick-bar-item-content">
                            <div class="text-base sm:text-2xs text-white" @click="submit">点击报名</div>
                        </div>
                    </div>
                </div>
                <div class="h-16"></div>
            </main>
        </div>
    <Footer-Menu actitem="enroll"></Footer-Menu>
</div>
</template>

<script>
import introduce from '/introduce.json'
//引入题库
export default {
    data(){
        return{
            deplist:["策划","运营","软件","美工","运维"],
            choose_dep:[],
            realName: "",
            stuId: "",
            phoneNumber: "",
            qqNumber: "",
            region: "", //xm /hw
            institute: "",
            major: "",
            selfIntroduce:""
        }
    },
    created(){
        //dep错误，跳转回去
        this.region="qz",
        this.institute="请选择学院"
    },
    methods:{
        choosedep(dep){
            var index = this.choose_dep.indexOf(dep);
                if (index > -1) {
                    this.choose_dep.splice(index, 1);
            }else if(this.choose_dep.length>=2){
                alert("最多只能选两个部门")
            }else{
                this.choose_dep.push(dep)
                }
        },
        submit(){
            if(this.realName.length<=1 || this.realName.length>=10){
                //照顾少数民族，不能太长
                alert('姓名需为2-10个字符')
            }else if(this.stuId.search(/^(17|18|19|20|21)[0-9]{8}$/)==-1){
                //学号错误？
                alert('请正确输入学号！')
            }else if(this.phoneNumber.search(/^(1)[0-9]{10}$/)==-1){
                alert('请正确输入电话号码！')
            }else if(this.qqNumber.search(/^[0-9]{6,10}$/)==-1){
                alert('请正确输入QQ号码！')
            }else if(this.institute=="请选择学院"){
                //没动
                alert('请正确选择学院！')
            }else if(this.major.length<2){
                //最少带个学字：数学
                alert('请正确填写专业！')
            }else if(this.choose_dep.length==0){
                //不需解释
                alert('请至少申请一个部门！')
            }else if(this.selfIntroduce.length==0){
                //不需解释
                alert('请至少写一些个人简介！')
            }else{
                this.$axios.post('/',{
                    'action':'enroll',
                    'realName':this.realName,
                    'stuId':this.stuId,
                    'phoneNumber':this.phoneNumber,
                    'qqNumber':this.qqNumber,
                    'region':this.region,
                    'institute':this.institute,
                    'major':this.major,
                    'enroll':this.choose_dep,
                    'selfIntroduce':this.selfIntroduce
                }).then(function (response) {
                    if(response.data.result == "success"){
                        alert("恭喜您，提交成功！");
                    }else{
                        alert("服务器错误，错误信息："+response.data.result);
                    }
                    console.log(response);
                })
                .catch(function (error) {
                    alert("网络错误，请稍后重试")
                    console.log(error);
                });
            }
        }
    }
}
</script>
<style>
.shadow-2xl-center {
    --tw-shadow: 0 5px 16px 0px rgba(0, 0, 0, 0.1);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000),
        var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
.topbar-background {
    background-color: #F8F8F8;
}

.rotate-30:hover {
    --tw-rotate: 30deg;
}

.quick-bar-item {
    @apply bg-gray-100 rounded-lg transition flex flex-grow auto-cols-auto items-center my-1 mx-2 pl-4 p-2 sm:p-1 sm:pl-2 sm:mx-1 justify-self-stretch;
}
.input-item {
    @apply bg-gray-100 rounded-2xl text-gray-600 placeholder-gray-300 transition my-1 mx-2 pl-4 p-2 sm:p-1 sm:pl-4 sm:mx-1 justify-self-stretch;
}
.input-item:focus {
    @apply outline-none shadow-md bg-blue-500 placeholder-blue-300 text-white;
}

.quick-bar-item-content {
    @apply mx-auto antialiased font-sans font-medium auto-rows-auto p-1 pl-4 sm:pl-2 flex-grow;
}
</style>
