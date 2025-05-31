<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { GalleryVerticalEnd } from 'lucide-vue-next';
</script>

<template>
    <div class="bg-muted flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
        <div class="flex w-full max-w-sm flex-col gap-6">
            <Link :href="route('home')" class="flex items-center gap-2 self-center font-medium">
                <div class="bg-primary text-primary-foreground flex h-8 w-8 items-center justify-center rounded-md">
                    <GalleryVerticalEnd class="size-4" />
                </div>

                {{ $page.props.name }}
            </Link>

            <slot />
        </div>
    </div>
</template>
