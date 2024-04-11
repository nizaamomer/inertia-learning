<template>
    <div>
        <Link href="/">Home</Link>
        <Link href="/about">About</Link>
        <Link href="/contact">Contact</Link>
    </div>
    <div>
        <slot/>
    </div>
</template>
<script setup>
import { Link } from "@inertiajs/vue3";
</script>
