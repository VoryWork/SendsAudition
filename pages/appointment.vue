<template>
<div>
    <div class="sticky top-0 pt-20 grid grid-flow-row justify-center topbar-background">
        <img class="h-36 mx-auto sm:h-24 origin-center transform transition ease-in-out delay-300 rotate-30" src="/app-icon/enroll_logo.png" />
        <div class="font-sans text-xl antialiased font-light text-igray-600 text-center pt-2">面试预约</div>
        <div class="font-sans antialiased font-light text-igray-600 text-center pb-4"></div>
    </div>
    <transition name="main-fade">
        <div class="container mx-auto" v-show="appointed==false">
            <div class="grid grid-cols-1 m-2">
                <div class="font-sans antialiased text-grey-400 font-medium text-left py-1 mt-1 mx-4">真实姓名</div>
                <input class="input-item" placeholder="李晓明" type="text" v-model="realName" required />
                <div class="font-sans antialiased text-grey-400 font-medium text-left py-1 mt-1 mx-4">学号</div>
                <input class="input-item" placeholder="2100000001" type="text" v-model="stuId" required />
                <div class="bg-blue-500 rounded-full shadow-md transition flex flex-grow auto-cols-auto select-none cursor-pointer items-center mt-4 my-2 mx-2 pl-4 p-2 sm:p-1 sm:pl-2 sm:mx-1 justify-self-stretch">
                    <div class="quick-bar-item-content">
                        <div class="text-base sm:text-2xs text-white flex items-center justify-center" @click="check"><i class="mdui-icon material-icons pr-1">check</i>确认预约，本操作不可取消</div>
                    </div>
                </div>
            </div>
            <div class="grid grid-flow-row flex max-w-sm mx-auto">
                <div class="font-sans antialiased font-light text-igray-600 text-center pt-4 pb-2 sm:pt-2 sm:pb-1 sm:text-xs ">本功能仅支持使用本系统报名的同学</div>
                <div class="font-sans antialiased font-light text-igray-600 text-center pt-4 pb-2 sm:pt-2 sm:pb-1 sm:text-xs ">现场报名请联系“工作人员”</div>
            </div>

            <div class="h-16"></div>
        </div>
    </transition>
    <transition name="main-fade">
        <div class="container mx-auto" v-show="appointed==true">
            <div class="appointed-item appointed-items-theme-2" v-for="(item,index) in status" :key="item.name">
                <div class="flex flex-row items-center">
                    <div class="flex flex-col flex-grow content-center">
                        <div class="text-2xl text-semibold py-1 flex items-center">{{item.name}} <button class="give-up-button" v-if="item.prepend!=0">放弃面试</button></div>
                        <div class="text-base"> {{item.prepend==0?'到你了':('你前面还有 ' +item.prepend +' 个人等待面试')}}</div>
                    </div>
                    <div class="text-6xl content-center">{{item.prepend}}</div>
                </div>
            </div>
            <div class="h-16"></div>
        </div>
    </transition>
    <Footer-Menu actitem="appointment"></Footer-Menu>
</div>
</template>

<script>
export default {
    data() {
        return {
            realName: "",
            stuId: "",
            appointed: false,
            status: [{
                    name: "策划",
                    prepend: 5
                }, {
                    name: "运维",
                    prepend: 1
                },
                {
                    name: "美工",
                    prepend: 7
                }
            ]
        }
    },
    methods: {
        check() {
            navigator.vibrate([500, 1000, 500, 1000, 500, 1000, 500]);
            //测试用的
            this.appointed = true
            return
            //此处为预约检测
            if (this.realName.length <= 1 || this.realName.length >= 10 || this.realName.search(/^[A-Za-z0-9]+$/) >= 0) {
                alert("姓名必须为2-10字符的非全英文字符串")
            } else if (this.stuId.search(/^(17|18|19|20|21)[0-9]{8}$/) == -1) {
                alert("请输入正确的学号")
            } else {
                //真正的get指令
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
.main-fade-leave-active{
    transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.main-fade-enter-active{
    transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    transition-delay:.3s;
}
.main-fade-leave-to{
  @apply transform translate-x-16;
  opacity: 0;
}
.main-fade-enter{
  @apply transform -translate-x-16;
  opacity: 0;
}
.appointed-item{
    @apply rounded-md bg-gray-100 m-4 h-24 p-4 shadow;
}
.appointed-items-theme-1{
    @apply bg-gradient-to-br from-pink-600 to-pink-400 text-white
}
.appointed-items-theme-2{
    @apply bg-gradient-to-br from-blue-700 to-indigo-500 text-white
}
.appointed-items-theme-3{
    @apply bg-gradient-to-br from-green-700 to-green-500 text-white
}
.give-up-button{
    @apply ml-3 transition bg-white shadow-md rounded-md text-sm text-red-700 px-2 py-1 hover:bg-red-500 focus:bg-red-500 hover:text-white focus:text-white;
}
</style>
