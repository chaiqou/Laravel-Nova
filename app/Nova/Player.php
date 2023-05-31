<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Player extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Player>
     */
    public static $model = \App\Models\Player::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    public static $tableStyle = 'tight';

    public static $clickAction = 'edit';

    public static $perPageOptions = [1];

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('name')
                ->rules('required', 'min:3', 'max:10')
                ->updateRules('unique:players,name,{{resourceId}}')
                ->creationRules('unique:players,name,{{resourceId}}'),

            Text::make('email')->rules('email'),
            Number::make('phone_number')->rules('integer', 'min_digits:3'),
            Number::make('thropy_count')->rules('integer', 'min:1', 'max:30'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
