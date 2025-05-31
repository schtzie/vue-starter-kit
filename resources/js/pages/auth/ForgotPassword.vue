<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Label } from '@/components/ui/label';
import GuestLayout from '@/layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps<{
    status?: string;
}>();

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout>
        <Head title="Forgot Password" />

        <div v-if="status" class="mb-4 text-center text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <div class="flex flex-col gap-6">
            <Card>
                <CardHeader class="text-center">
                    <CardTitle class="text-xl"> Forgot Password </CardTitle>
                    <CardDescription> Enter your email to receive a password reset link </CardDescription>
                </CardHeader>

                <CardContent>
                    <form @submit.prevent="submit">
                        <div class="grid gap-6">
                            <div class="grid gap-2">
                                <Label for="email">Email Address</Label>

                                <InputText
                                    type="text"
                                    class="w-full"
                                    v-model="form.email"
                                    placeholder="Email Address"
                                    autofocus
                                    :invalid="form.errors.email ? true : false"
                                    autocomplete="email"
                                />

                                <InputError :message="form.errors.email" />
                            </div>

                            <Button
                                class="btn btn-primary flex w-full grow justify-center"
                                :label="form.processing ? 'Loading..' : 'Email password reset link'"
                                type="submit"
                                size="small"
                                :loading="form.processing"
                            />

                            <div class="text-center text-sm">
                                Or, return to
                                <Link :href="route('login')" class="underline underline-offset-4"> Sign In </Link>
                            </div>
                        </div>
                    </form>
                </CardContent>
            </Card>
        </div>
    </GuestLayout>
</template>
