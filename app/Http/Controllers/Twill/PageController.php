<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\Fields\Checkbox;
use A17\Twill\Services\Forms\Fieldset;
use A17\Twill\Services\Listings\Columns\Text;
use A17\Twill\Services\Listings\TableColumns;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fields\BlockEditor;
use A17\Twill\Services\Forms\Form;
use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;

class PageController extends BaseModuleController
{
    protected $moduleName = 'pages';
    /**
     * This method can be used to enable/disable defaults. See setUpController in the docs for available options.
     */
    protected function setUpController(): void
    {
        $this->setPermalinkBase('');

        $this->withoutLanguageInPermalink();
    }

    /**
     * See the table builder docs for more information. If you remove this method you can use the blade files.
     * When using twill:module:make you can specify --bladeForm to use a blade form instead.
     */
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        $form->add(
            Checkbox::make()->name('transparent_nav')->label('Átlátszó menü')->default(true)
        );

        $form->add(
          Medias::make()->name('slider')->label('Slider')->max(10)
        );

        $form->add(
            BlockEditor::make()
        );

        $form->addFieldset(
            Fieldset::make()->title('Seo')->id('seo')->fields([
                Input::make()->name('seo_keywords')->label('Kulcsszavak')->translatable()->note('Pontosvesszővel elválasztva lehet többet megadni.'),
                Input::make()->name('seo_description')->label('Seo Description')->translatable()->maxLength(156),
                Medias::make()->name('seo_cover')->label('Seo image')

            ])
        );


        return $form;
    }

    /**
     * This is an example and can be removed if no modifications are needed to the table.
     */
    protected function additionalIndexTableColumns(): TableColumns
    {
        $table = parent::additionalIndexTableColumns();

        $table->add(
            Text::make()->field('description')->title('Description')
        );

        return $table;
    }
}
