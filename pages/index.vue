<template>
<div>
        <div class="sticky top-0 pt-20 grid grid-flow-row justify-center topbar-background">
            <img class="h-36 mx-auto sm:h-24 origin-center transform transition ease-in-out delay-300 rotate-30" src="/app-icon/enroll_logo.png" />
            <div class="font-sans text-xl antialiased font-light text-igray-600 text-center pt-2">桑梓招聘姬</div>
            <div class="font-sans antialiased font-light text-igray-600 text-center pb-4">Sends Enroll Helper</div>
        </div>
        <div>
            <main class="container mx-auto">
                <div class="grid grid-flow-row flex max-w-sm mx-auto">
                    <div class="font-sans antialiased font-light text-igray-600 text-center pt-4 pb-2 sm:pt-2 sm:pb-1 sm:text-xs ">功能菜单</div>
                    <div class="grid grid-cols-1 m-2">
                        <nuxt-link to="/test">
                            <div class="quick-bar-item"><img src="/app-icon/join-us.png" class="h-10 w-10 sm:h-6 sm:w-6" />
                                <div class="quick-bar-item-content">
                                    <div class="text-base sm:text-2xs">做个小测试</div>
                                    <div class="text-xs sm:text-3xs">看看你适合加入哪个部门</div>
                                </div>
                            </div>
                        </nuxt-link>
                        <nuxt-link to="/enroll">
                            <div class="quick-bar-item"><img src="/app-icon/advices.png" class="h-10 w-10 sm:h-6 sm:w-6" />
                                <div class="quick-bar-item-content">
                                    <div class="text-base sm:text-2xs">马上报名</div>
                                    <div class="text-xs sm:text-3xs">快来加入桑梓吧</div>
                                </div>
                            </div>
                        </nuxt-link>
                        <nuxt-link to="/appointment">
                            <div class="quick-bar-item"><img src="/app-icon/contact-us.png" class="h-10 w-10 sm:h-6 sm:w-6" />
                                <div class="quick-bar-item-content">
                                    <div class="text-base sm:text-2xs">面试预约</div>
                                    <div class="text-xs sm:text-3xs">报名后记得来面试哦</div>
                                </div>
                            </div>
                        </nuxt-link>
                        <div class="text-center text-gray-700 p-2 text-xs sm:text-3xs">Design by SendsLab</div>
                    </div>
                </div>
                <div class="h-16"></div>
            </main>
        <Footer-Menu actitem="home"></Footer-Menu>
    </div>
</div>
</template>

<script>
//引入题库
import tiku from "/test-tiku.json"
export default {
    methods: {
        test_axios() {
            this.$axios.$get('/').then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });

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
    @apply bg-gray-100 rounded-lg transition flex flex-grow auto-cols-auto items-center mx-2 my-2 pl-4 p-2 sm:p-1 sm:pl-2 sm:mx-1 justify-self-stretch;
}
.quick-bar-item-content {
    @apply mx-auto antialiased font-sans font-medium auto-rows-auto p-1 pl-4 sm:pl-2 flex-grow;
}
</style>
