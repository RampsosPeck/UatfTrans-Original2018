@extends('layouts.master')

@section('content') 
    <template v-if="menu==0">
        <dashboard></dashboard>
    </template>
    <template v-if="menu==1">
        <users></users>
    </template>
    <template v-if="menu==2">
        <developer></developer>
    </template>
    <template v-if="menu==3">
        <scan></scan>
    </template>
    <template v-if="menu==4">
        @include('qrcode.qrview')
    </template>
    <template v-if="menu==5">
        <report></report>
    </template>
    <template v-if="menu==6">
        <help></help>
    </template>
    <template v-if="menu==7">
        <android></android>
    </template>
@endsection
