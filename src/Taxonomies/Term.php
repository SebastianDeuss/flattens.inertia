<?php

namespace Flatinertia\Taxonomies;

use JsonSerializable;
use Illuminate\Support\Str;
use Statamic\Contracts\Taxonomies\Term as Contract;
use Statamic\Taxonomies\Term as Statamic;
use Flatinertia\Contracts\Resourceable;
use Flatinertia\Http\Resourceable as HasResource;

class Term extends Statamic implements Contract, Resourceable, JsonSerializable
{
    use HasResource;

    public function in($site)
    {
        return new LocalizedTerm($this, $site);
    }

    public function resourceName()
    {
        $class = (string) Str::of($this->taxonomyHandle())
            ->camel()
            ->ucfirst();

        return "Terms\\$class";
    }

    public function jsonSerialize()
    {
        return $this->toResource()->jsonSerialize();
    }
}
