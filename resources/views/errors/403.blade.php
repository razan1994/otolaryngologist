@extends('errors::minimal')

@section('title', ___('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))
