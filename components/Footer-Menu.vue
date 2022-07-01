<template>
        <footer class="footer-menu">
            <div class="footer-menu-content">
                <div class="grid grid-cols-4 p-2 space-x-2">
                    <nuxt-link to="/"><div class="footer-menu-item" :class="actitem=='home'?'footer-menu-item-active':''" ><img src="/app-icon/home.svg" class="mx-auto h-8 w-8 p-1" />主页</div></nuxt-link>
                    <nuxt-link to="/enroll"><div class="footer-menu-item" :class="actitem=='enroll'?'footer-menu-item-active':''" ><img src="/app-icon/apps.svg" class="mx-auto h-8 w-8 p-1" />报名</div></nuxt-link>
                    <nuxt-link to="/test"><div class="footer-menu-item" :class="actitem=='test'?'footer-menu-item-active':''" ><img src="/app-icon/activity.svg" class="mx-auto h-8 w-8 p-1" />小测试</div></nuxt-link>
                    <nuxt-link to="/appointment"><div class="footer-menu-item" :class="actitem=='appointment'?'footer-menu-item-active':''" ><img src="/app-icon/mine.svg" class="mx-auto h-8 w-8 p-1" />面试预约</div></nuxt-link>
                </div>
            </div>
        </footer>
</template>


<script>
export default {
        props: {
            actitem: {
                type: String,
                default: ''
                // require: true // 必填
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
.footer-menu{
    @apply fixed z-auto transition bottom-0 sm:bottom-4 w-full sm:w-8/12 lg:w-6/12 xl:w-4/12 2xl:w-3/12 sm:right-4 z-40;
}
.footer-menu-content{
    @apply sm:rounded-lg mx-auto bg-white text-center text-gray-600 shadow-2xl-center sm:shadow-xl;
}
.footer-menu-item{
    @apply transition rounded-md text-sm antialiased font-sans font-medium
}
.footer-menu-item:hover{
    @apply bg-gray-200
}
.footer-menu-item:focus{
    @apply ring-gray-500 ring-2 
}
.footer-menu-item-active{
    @apply bg-gray-200
}
</style>