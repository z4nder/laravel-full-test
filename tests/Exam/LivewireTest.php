<?php

namespace Tests\Exam;

use Illuminate\Support\Carbon;
use Livewire\Livewire;
use Tests\TestCase;

/**
 * Livewire Test
 * On this test we will create a Week View component.
 * - This component will navigate between dates.
 * - The selected date will always be on the center of the list.
 * - And it should show 3 previous date and 3 next dates
 *
 * You can see the component in action on this link:
 * https://www.loom.com/share/3b684b6b01584100ad7052c0397c12eb
 * Password: devsquad-exam
 *
 * @package Tests\Feature\Exam
 */
class LivewireTest extends TestCase
{
    /** @test */
    public function it_should_show_today_date_by_default_along_with_3_previous_and_after_days()
    {
        Carbon::setTestNow('2020-09-09');

        Livewire::test(\App\Http\Livewire\Week::class)
            ->assertSet('currentDate', new Carbon('2020-09-09'))
            ->assertSet('days', [
                new Carbon('2020-09-06'),
                new Carbon('2020-09-07'),
                new Carbon('2020-09-08'),
                new Carbon('2020-09-09'),
                new Carbon('2020-09-10'),
                new Carbon('2020-09-11'),
                new Carbon('2020-09-12'),
            ]);
    }

    /** @test */
    public function it_should_be_able_to_set_a_current_date_and_the_days_will_change_accordingly()
    {
        Carbon::setTestNow('2020-09-09');

        Livewire::test(\App\Http\Livewire\Week::class)
            ->assertSet('currentDate', new Carbon('2020-09-09'))
            ->assertSet('days', [
                new Carbon('2020-09-06'),
                new Carbon('2020-09-07'),
                new Carbon('2020-09-08'),
                new Carbon('2020-09-09'),
                new Carbon('2020-09-10'),
                new Carbon('2020-09-11'),
                new Carbon('2020-09-12'),
            ])
            ->call('changeDay', '2020-09-10')
            ->assertSet('currentDate', new Carbon('2020-09-10'))
            ->assertSet('days', [
                new Carbon('2020-09-07'),
                new Carbon('2020-09-08'),
                new Carbon('2020-09-09'),
                new Carbon('2020-09-10'),
                new Carbon('2020-09-11'),
                new Carbon('2020-09-12'),
                new Carbon('2020-09-13'),
            ]);
    }

    /** @test */
    public function it_should_be_able_to_go_to_the_next_day()
    {
        Carbon::setTestNow('2020-09-09');

        Livewire::test(\App\Http\Livewire\Week::class)
            ->assertSet('currentDate', new Carbon('2020-09-09'))
            ->assertSet('days', [
                new Carbon('2020-09-06'),
                new Carbon('2020-09-07'),
                new Carbon('2020-09-08'),
                new Carbon('2020-09-09'),
                new Carbon('2020-09-10'),
                new Carbon('2020-09-11'),
                new Carbon('2020-09-12'),
            ])
            ->call('nextDay')
            ->assertSet('currentDate', new Carbon('2020-09-10'))
            ->assertSet('days', [
                new Carbon('2020-09-07'),
                new Carbon('2020-09-08'),
                new Carbon('2020-09-09'),
                new Carbon('2020-09-10'),
                new Carbon('2020-09-11'),
                new Carbon('2020-09-12'),
                new Carbon('2020-09-13'),
            ]);
    }

    /** @test */
    public function it_should_be_able_to_go_to_the_previous_day()
    {
        Carbon::setTestNow('2020-09-09');

        Livewire::test(\App\Http\Livewire\Week::class)
            ->assertSet('currentDate', new Carbon('2020-09-09'))
            ->assertSet('days', [
                new Carbon('2020-09-06'),
                new Carbon('2020-09-07'),
                new Carbon('2020-09-08'),
                new Carbon('2020-09-09'),
                new Carbon('2020-09-10'),
                new Carbon('2020-09-11'),
                new Carbon('2020-09-12'),
            ])
            ->call('previousDay')
            ->assertSet('currentDate', new Carbon('2020-09-08'))
            ->assertSet('days', [
                new Carbon('2020-09-05'),
                new Carbon('2020-09-06'),
                new Carbon('2020-09-07'),
                new Carbon('2020-09-08'),
                new Carbon('2020-09-09'),
                new Carbon('2020-09-10'),
                new Carbon('2020-09-11'),
            ]);
    }

    /** @test */
    public function it_should_dispatch_an_event_after_change_date()
    {
        Carbon::setTestNow('2020-09-09');

        Livewire::test(\App\Http\Livewire\Week::class)
            ->call('changeDay', '2020-09-10')
            ->assertEmitted('Week.DayChanged')
            ->call('nextDay')
            ->assertEmitted('Week.DayChanged')
            ->call('previousDay')
            ->assertEmitted('Week.DayChanged');
    }

    /**
     * @test
     * @param string $date
     *
     * @testWith ["2020-20-20"]
     *           ["not-valid-date"]
     *           ["20-20-2020"]
     *           ["10-18-2020"]
     */
    public function day_should_be_a_valid_date(string $date)
    {
        Livewire::test(\App\Http\Livewire\Week::class)
            ->call('changeDay', $date)
            ->assertHasErrors(['day' => 'date']);
    }
}
