<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Label } from '@/components/ui/label';
import GuestLayout from '@/layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    username: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <div class="flex flex-col gap-6">
            <Card>
                <CardHeader class="text-center">
                    <CardTitle class="text-xl"> Create an account </CardTitle>
                    <CardDescription> Enter your details below to create your account </CardDescription>
                </CardHeader>

                <CardContent>
                    <form @submit.prevent="submit">
                        <div class="grid gap-6">
                            <div class="grid gap-2">
                                <Label for="name">Name</Label>

                                <InputText
                                    type="text"
                                    class="w-full"
                                    v-model="form.name"
                                    placeholder="Name"
                                    autofocus
                                    :invalid="form.errors.name ? true : false"
                                />

                                <InputError :message="form.errors.name" />
                            </div>

                            <div class="grid gap-2">
                                <Label for="username">Username</Label>

                                <InputText
                                    type="text"
                                    class="w-full"
                                    v-model="form.username"
                                    placeholder="Username"
                                    autofocus
                                    :invalid="form.errors.username ? true : false"
                                />

                                <InputError :message="form.errors.username" />
                            </div>

                            <div class="grid gap-2">
                                <Label for="email">Email Address</Label>

                                <InputText
                                    type="text"
                                    class="w-full"
                                    v-model="form.email"
                                    placeholder="Email Address"
                                    autofocus
                                    :invalid="form.errors.email ? true : false"
                                />

                                <InputError :message="form.errors.email" />
                            </div>

                            <div class="grid gap-2">
                                <Label for="password">Password</Label>

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

                            <div class="grid gap-2">
                                <Label for="password_confirmation">Confirm Password</Label>

                                <Password
                                    size="small"
                                    inputClass="p-password-input-sm-login p-password-input-width"
                                    v-model="form.password_confirmation"
                                    :feedback="false"
                                    :invalid="form.errors.password ? true : false"
                                    toggleMask
                                    placeholder="Confirm Password"
                                />

                                <InputError :message="form.errors.password_confirmation" />
                            </div>

                            <Button
                                class="btn btn-primary flex w-full grow justify-center"
                                :label="form.processing ? 'Loading..' : 'Create Account'"
                                type="submit"
                                size="small"
                                :loading="form.processing"
                            />

                            <div class="text-center text-sm">
                                Already have an account?
                                <Link :href="route('login')" class="underline underline-offset-4"> Sign In </Link>
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
