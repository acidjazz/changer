<?php
namespace App\Services;

class ChangeService
{
    private int $price;

    /**
     * Our register drawer
     *
     * @var array|int[] drawer
     */
    private array $drawer = [
        [ 'name' => '1,000', 'value' => 100000 ],
        [ 'name' => '100', 'value' => 10000 ],
        [ 'name' => '50', 'value' => 5000 ],
        [ 'name' => '20', 'value' => 2000 ],
        [ 'name' => '10', 'value' => 1000 ],
        [ 'name' => '5', 'value' => 500 ],
        [ 'name' => '1', 'value' => 100 ],
        [ 'name' => '.25', 'value' => 25 ],
        [ 'name' => '.5', 'value' => 5 ],
        [ 'name' => '.1', 'value' => 1 ],
    ];

    /**
     * Each individual bill
     *
     * @var array $change
     */
    private array $change;

    /**
     * Bills stacked
     *
     * @var array $stacked
     */
    private array $stacked = [];

    /**
     * ChangeService constructor.
     * @param int $price
     */
    public function __construct(int $price)
    {
        $this->price = $price;
    }

    /**
     * Calculate and return change based on drawer
     *
     * @param int $wallet
     * @return array
     */
    public function change(int $wallet)
    {
        $diff = $wallet - $this->price;

        /* Populate individual moneys */
        foreach ($this->drawer as $bill) {
            while (true) {
                if ($bill['value'] <= $diff) {
                    $this->change[] = $bill;
                    $diff -= $bill['value'];
                } else {
                    break;
                }
            }
        }

        /* Stack our moneys with an amount */
        foreach ($this->change as $bill) {
            if (array_filter($this->stacked, fn ($s) => $s['name'] === $bill['name']) === []) {
                $this->stacked[] =
                    array_merge($bill,
                        ['amount' => count(array_filter($this->change, fn($b) => $b['name'] === $bill['name']))]
                );
            }
        }
        return $this->stacked;
    }
}
