@twillBlockTitle('Content With Image')
@twillBlockIcon('text')
@twillBlockGroup('app')

{{--<x-twill::input--}}
{{--    name="id"--}}
{{--    label="Id"--}}
{{--    :maxlength="50"--}}
{{--/>--}}

@php
    $extraMetadata = [
        [
            'name' => 'youtube_url',
            'label' => 'Youtube url',
            'type' => 'text',
            'wysiwyg' => false,
        ],
    ];
@endphp

<x-twill::medias
    name="cover"
    label="cover"
/>

<x-twill::select
    name="position"
    label="Image position"
    placeholder="Select an image position"
    :options="[
        [
            'value' => 'left',
            'label' => 'Left'
        ],
        [
            'value' => 'right',
            'label' => 'Right'
        ],
    ]"
    default="left"
/>

<x-twill::checkbox
    name="is_vertical"
    label="Vertical image"
/>

<x-twill::medias
    name="gallery"
    label="Gallery"
    :max="15"
    withVideoUrl="true"
    :extra-metadatas="$extraMetadata"
/>


<x-twill::wysiwyg
    name="content"
    label="Content"
    placeholder="Content"
    :toolbar-options="[
        [ 'header' => [1, 2, 3, 4, false] ],
        'bold',
        'italic',
        ['list' => 'bullet'],
        ['list' => 'ordered'],
        [ 'script' => 'super' ],
        [ 'script' => 'sub' ],
        'link',
        'clean'
    ]"
    :translated="true"
/>
