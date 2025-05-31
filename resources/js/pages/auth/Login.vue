<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Label } from '@/components/ui/label';
import GuestLayout from '@/layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps<{
    status?: string;
    canResetPassword: boolean;
}>();

const form = useForm({
    username: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Sign In" />

        <div v-if="status" class="mb-4 text-center text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <div class="flex flex-col gap-6">
            <Card>
                <CardHeader class="text-center">
                    <CardTitle class="text-xl"> Sign In </CardTitle>
                    <CardDescription> Sign In to your account </CardDescription>
                </CardHeader>

                <CardContent>
                    <form @submit.prevent="submit">
                        <div class="grid gap-6">
                            <div class="grid gap-2">
                                <Label for="username">Username</Label>

                                <InputText
                                    type="text"
                                    class="w-full"
                                    v-model="form.username"
                                    placeholder="Username"
                                    autofocus
                                    :invalid="form.errors.username ? true : false"
                                    autocomplete="username"
                                />

                                <InputError :message="form.errors.username" />
                            </div>

                            <div class="grid gap-2">
                                <div class="flex items-center">
                                    <Label for="password">Password</Label>
                                    <Link :href="route('password.request')" class="ml-auto text-sm underline-offset-4 hover:underline"> Forgot your password? </Link>
                                </div>

                                <Password
                                    size="small"
                                    inputClass="p-password-input-sm-login p-password-input-width"
                                    v-model="form.password"
                                    :feedback="false"
                                    :invalid="form.errors.password ? true : false"
                                    toggleMask
                                    placeholder="Password"
                                />

                                <InputError :message="form.errors.password" />
                            </div>

                            <div class="flex items-center justify-between">
                                <Label for="remember" class="flex items-center space-x-1">
                                    <Checkbox v-model="form.remember" inputId="remember" name="remember" :value="true" />

                                    <span>Remember me</span>
                                </Label>
                            </div>

                            <Button
                                class="btn btn-primary flex w-full grow justify-center"
                                :label="form.processing ? 'Loading..' : 'Sign In'"
                                type="submit"
                                size="small"
                                :loading="form.processing"
                            />

                            <div class="text-center text-sm">
                                Don't have an account?
                                <Link :href="route('register')" class="underline underline-offset-4"> Sign Up </Link>
                            </div>
                        </div>
                    </form>
                </CardContent>
            </Card>
        </div>
    </GuestLayout>
</template>

<style>
.p-password-input-sm-login {
    font-size: 0.8125rem !important;
    padding: 0.4375rem 0.65625rem;
}

.p-password,
.p-password-input-width {
    width: 100% !important;
    height: 38px !important;
}
</style>
