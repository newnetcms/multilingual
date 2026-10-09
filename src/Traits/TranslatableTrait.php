<?php

namespace Newnet\Multilingual\Traits;

use Spatie\Translatable\HasTranslations as BaseHasTranslations;

trait TranslatableTrait
{
    use BaseHasTranslations;

    protected function asJson($value, $flags = 0)
    {
        return json_encode($value, $flags | JSON_UNESCAPED_UNICODE);
    }

    protected function getLocale(): string
    {
        return $this->translationLocale ?: request('edit_locale') ?? config('app.locale');
    }

    public function useFallbackLocale(): bool
    {
        return !request()->is(config('cms.adminui.admin_prefix').'*');
    }
}
