<template>
<div>
        <div class="sticky top-0 pt-10 grid grid-flow-row justify-center topbar-background">
            <div class="font-sans text-3xl antialiased text-indigo-600 text-center pt-2">{{dep}}</div>
            <div class="font-sans antialiased text-center py-2 mb-3">您可能更适合此部门</div>
        </div>
        <div>
            <main class="container mx-auto">
                <div class="grid grid-flow-row flex max-w-sm mx-auto mt-4">
                    <div class="font-sans antialiased text-gray-500 p-2 pt-4 pb-2 sm:pt-2 sm:pb-1 sm:text-xs ">{{introduce[dep]}}</div>
                </div>
                <div class="grid grid-cols-1 m-2">
                    <nuxt-link to="/enroll"><div class="quick-bar-item"><img src="/app-icon/advices.png" class="h-10 w-10 sm:h-6 sm:w-6" />
                            <div class="quick-bar-item-content">
                                <div class="text-base sm:text-2xs">马上报名</div>
                                <div class="text-xs sm:text-3xs">快来加入桑梓吧</div>
                            </div>
                        </div>
                    </nuxt-link>
                    <nuxt-link to="/"><div class="quick-bar-item"><img src="/app-icon/two-hand.png" class="h-10 w-10 sm:h-6 sm:w-6" />
                            <div class="quick-bar-item-content">
                                <div class="text-base sm:text-2xs">返回首页</div>
                                <div class="text-xs sm:text-3xs">我再看看</div>
                            </div>
                        </div>
                    </nuxt-link>
                </div>
                <div class="h-16"></div>
            </main>
        <Footer-Menu></Footer-Menu>
    </div>
</div>
</template>

<script>
import introduce from '/introduce.json'
//引入题库
export default {
    data(){
        return{
            deplist:["策划","运营","软件","美工","运维"],
            dep:this.$route.query.dep,
            introduce:{}
        }
    },
    created(){
        this.introduce = introduce
        //dep错误，跳转回去
        if(this.deplist.indexOf(this.dep) == -1){
            this.$router.push({
                path: '/'
                    })
        }
    },
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
.quick-bar-item:hover {
    @apply bg-blue-500 text-white;
}
.quick-bar-item-content {
    @apply mx-auto antialiased font-sans font-medium auto-rows-auto p-1 pl-4 sm:pl-2 flex-grow;
}
</style>
