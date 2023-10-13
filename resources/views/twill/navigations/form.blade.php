@extends('twill::layouts.form')

@section('contentFields')

    <x-twill::radios
        name="type"
        label="Article type"
        default="page"
        :inline="true"
        :options="[
            [
                'value' => 'page',
                'label' => 'Page'
            ],
            [
                'value' => 'url',
                'label' => 'Url'
            ]
        ]"
    />

    <x-twill::formConnectedFields
        field-name="type"
        field-values="page"
    >
        <x-twill::browser
            module-name="Pages"
            name="page"
            label="Page"
        />

    </x-twill::formConnectedFields>

    <x-twill::formConnectedFields
        field-name="type"
        field-values="url"
    >

        <x-twill::input
            label="Url"
            name="url"
            type="url"
            :translated="true"
        />

    </x-twill::formConnectedFields>


@stop
