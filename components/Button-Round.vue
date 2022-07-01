<template>
<button type="button" class="btn-round transition ease-out duration-200" v-on:click="$emit('click', $event.target.value)">
    <slot></slot>
</button>
</template>

<script>
export default {
}
</script>

<style>
.btn-round {
    @apply py-2 px-4 text-white rounded-lg shadow-md;
}

.btn-round:focus {
    @apply outline-none ring-2 ring-offset-2 ring-opacity-75 ring-transparent;
}

.btn-round-blue {
    @apply bg-blue-500;
}

.btn-round-blue:hover {
    @apply bg-blue-700;
}

.btn-round-blue:focus {
    @apply ring-blue-500;
}

.btn-round-red {
    @apply bg-red-500;
}

.btn-round-red:hover {
    @apply bg-red-700;
}

.btn-round-red:focus {
    @apply ring-red-500;
}

.btn-round-yellow {
    @apply bg-yellow-500;
}

.btn-round-yellow:hover {
    @apply bg-yellow-700;
}

.btn-round-yellow:focus {
    @apply ring-yellow-500;
}

.btn-round-indigo {
    @apply bg-indigo-500;
}

.btn-round-indigo:hover {
    @apply bg-indigo-700;
}

.btn-round-indigo:focus {
    @apply ring-indigo-500;
}

.btn-round-purple {
    @apply bg-purple-500;
}

.btn-round-purple:hover {
    @apply bg-purple-700;
}

.btn-round-purple:focus {
    @apply ring-purple-500;
}

.btn-round-green {
    @apply bg-green-500;
}

.btn-round-green:hover {
    @apply bg-green-700;
}

.btn-round-green:focus {
    @apply ring-green-500;
}
</style>
