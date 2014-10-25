<?php
namespace TypiCMS\Modules\Pages\Observers;

use Config;
use DB;
use Illuminate\Database\Eloquent\Model;
use TypiCMS\Modules\Pages\Models\Page;

class SortObserver
{

    /**
     * On update, update children uris
     * 
     * @param  Page $model
     * @return void
     */
    public function updating(Page $model)
    {
        if ($model->isDirty('page_id')) {

            foreach (Config::get('app.locales') as $locale) {
                $model->translate($locale)->uri = null;
            }

        }
    }
}
