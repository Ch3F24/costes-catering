@twillBlockTitle('Content With Image')
@twillBlockIcon('text')
@twillBlockGroup('app')

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

<x-twill::medias
    name="slider"
    label="Slide images"
    :max="5"
/>

<x-twill::wysiwyg
    name="content"
    label="Content"
    placeholder="Content"
    :toolbar-options="[
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
