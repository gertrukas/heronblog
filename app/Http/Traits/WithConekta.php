<?php

namespace App\Http\Traits;

use App\Models\CartProductRecurrence;
use App\Models\Product;
use App\Models\ProductRecurrence;
use App\Models\User;
use Exception;
use Conekta\Plan;
use Conekta\Conekta;
use Conekta\Customer;
use Conekta\Order;

trait WithConekta
{
    public function setCredentials()
    {
        Conekta::setApiKey(config('globals.conekta.key_private'));
        Conekta::setApiVersion(config('globals.conekta.api_version'));
    }

    public function createPlans($params)
    {
        /*  $params {
            id, name (*) , amount(*), currency(*) default "MXN",
            interval(*) week/half_month/month/year | semanal / quincenal / mensual / anual,
            frecuency(*) default 1, trial_period_days (*) default "0" , expiry_count (*)
            }
        */
        $this->setCredentials();
        try {
            return Plan::create($params);
        } catch (Exception $e) {
        }
    }

    public function calculateFrecuency($type)
    {
        switch ($type) {
            case 1:
                return 1;
                break;
            case 2:
                return 2;
                break;
            case 3:
                return 3;
                break;
            case 4:
                return 4;
                break;
            case 5:
                return 6;
                break;
            case 6:
                return 1;
                break;
        }
        return 0;
    }



    public function updatePlans($params, $idPlans)
    {
        /*  $params {
            id, name (*) , amount(*), currency(*) default "MXN",
            interval(*) week/half_month/month/year | semanal / quincenal / mensual / anual,
            frecuency(*) default 1, trial_period_days (*) default "0" , expiry_count (*)
            }
        */
        $this->setCredentials();
        try {
            $dataPlan = Plan::find($idPlans);
            return  $dataPlan->update($params);
        } catch (Exception $e) {
        }
    }

    public function createConektaCustomer($cutomerData)
    {
        $this->setCredentials();
        try {
            return Customer::create($cutomerData);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getConektaCustomerById($id)
    {
        $this->setCredentials();
        try {
            $customer = Customer::find($id);
            return $customer;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateCutomerPaymentSource($customer, $tokenId)
    {
        $this->setCredentials();
        try {
            $source = $customer->createPaymentSource([
                'type' => 'card',
                'token_id' => $tokenId
            ]);
            $customer->update(['default_payment_source_id' => $source->id]);
            return $source;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function assignRoleUser($cart_id = null)
    {
        try {
            $product_recurrences_id = CartProductRecurrence::where('cart_id', $cart_id)->pluck('product_recurrence_id')->toArray();
            $products_id = ProductRecurrence::whereIn('id', $product_recurrences_id)->pluck('product_id')->toArray();
            $type_products_id = Product::whereIn('id', $products_id)->pluck('type_product')->toArray();
            $rolesClient = ['client suscription', 'client database', 'client model'];
            $user = User::find(auth()->id());
            foreach ($type_products_id as $type_product_id) {
                switch ($type_product_id) {
                    case 2: // Suscripcion
                        if (!$user->hasRole($rolesClient[0])) {
                            $user->assignRole($rolesClient[0]);
                        }
                        break;
                    case 3: // Base de datos Neodata
                        if (!$user->hasRole($rolesClient[1])) {
                            $user->assignRole($rolesClient[1]);
                        }
                        break;
                    case 4: // Base de datos Opus
                        if (!$user->hasRole($rolesClient[1])) {
                            $user->assignRole($rolesClient[1]);
                        }
                        break;
                    case 5: // valuador online
                        if (!$user->hasRole($rolesClient[2])) {
                            $user->assignRole($rolesClient[2]);
                        }
                        break;
                }
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return 'Hubo un problema al intentar de asignarle los roles al usuario';
        }
    }

    public function createConektaOrder($data)
    {
        $this->setCredentials();
        try {
            $cart_id = $data['metadata']['cart_id'];
            $order = Order::create($data);
            $this->assignRoleUser($cart_id);
            return $order;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getConektaOrderById($id)
    {
        $this->setCredentials();
        try {
            return Order::find($id);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function groupDuplicatedLineItems($lineItems)
    {
        $newLineItems = collect();
        foreach ($lineItems as $lineItem) {
            if ($newLineItems->firstWhere('sku', $lineItem['sku'])) {
                $newLineItems = $newLineItems->map(function ($item) use ($lineItem) {
                    if ($item['sku'] == $lineItem['sku']) {
                        $item['quantity'] += $lineItem['quantity'];
                    }

                    return $item;
                });
            } else {
                $newLineItems->add($lineItem);
            }
        }

        return $newLineItems->toArray();
    }

    // public function getProductRecurrenceIdsFromLineItems($lineItems)
    // {
    //     $productRecurrenceIds = [];
    //     foreach ($lineItems as $lineItem) {
    //         if (!collect($productRecurrenceIds)->contains($lineItem['sku'])) {
    //             $productRecurrenceIds[] = $lineItem['sku'];
    //         }

    //     }

    //     return $productRecurrenceIds;
    // }

    // public function createSubscription($params,$idClients){
    //     $this->setCredentials();
    //     try {
    //         $customer = Customer::find($idClients);
    //        return $customer->createSubscription($params);
    //     } catch (Exception $e) {

    //     }


    // }
}
