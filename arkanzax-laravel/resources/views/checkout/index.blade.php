@extends('layouts.app')
@section('title', 'Checkout | Arkanzax')

@section('content')
    <section style="padding-top:160px;padding-bottom:80px;min-height:80vh;">
        <div class="container" style="max-width:800px;">
            <div class="section-header text-center">
                <h2 class="section-title" data-en="Checkout" data-ar="الدفع">Checkout</h2>
            </div>

            <div id="checkout-app" style="background:#f8fafc;border-radius:16px;padding:40px;">
                <form id="checkout-form">
                    <div style="display:grid;gap:16px;">
                        <h3>Personal Information</h3>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                            <div><label style="display:block;margin-bottom:6px;font-weight:600;">First Name *</label><input
                                    type="text" id="co-first-name" required
                                    style="width:100%;padding:12px 16px;border:1px solid #ddd;border-radius:8px;font-size:1rem;">
                            </div>
                            <div><label style="display:block;margin-bottom:6px;font-weight:600;">Last Name *</label><input
                                    type="text" id="co-last-name" required
                                    style="width:100%;padding:12px 16px;border:1px solid #ddd;border-radius:8px;font-size:1rem;">
                            </div>
                        </div>
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                            <div><label style="display:block;margin-bottom:6px;font-weight:600;">Email *</label><input
                                    type="email" id="co-email" required
                                    style="width:100%;padding:12px 16px;border:1px solid #ddd;border-radius:8px;font-size:1rem;">
                            </div>
                            <div><label style="display:block;margin-bottom:6px;font-weight:600;">Phone *</label><input
                                    type="text" id="co-phone" required
                                    style="width:100%;padding:12px 16px;border:1px solid #ddd;border-radius:8px;font-size:1rem;">
                            </div>
                        </div>

                        <h3 style="margin-top:16px;">Delivery Address</h3>
                        <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:16px;">
                            <div><label style="display:block;margin-bottom:6px;font-weight:600;">Country</label><select
                                    id="co-country" style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;"
                                    onchange="loadStates(this.value)">
                                    <option value="">Select Country</option>@foreach($countries as $c)<option
                                        value="{{ $c['id'] ?? '' }}">{{ $c['name_en'] ?? $c['name_ar'] ?? '' }}</option>
                                    @endforeach
                                </select></div>
                            <div><label style="display:block;margin-bottom:6px;font-weight:600;">State</label><select
                                    id="co-state" style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;"
                                    onchange="loadCities(this.value)">
                                    <option value="">Select State</option>
                                </select></div>
                            <div><label style="display:block;margin-bottom:6px;font-weight:600;">City</label><select
                                    id="co-city" style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;">
                                    <option value="">Select City</option>
                                </select></div>
                        </div>
                        <div><label style="display:block;margin-bottom:6px;font-weight:600;">Address</label><input
                                type="text" id="co-address"
                                style="width:100%;padding:12px 16px;border:1px solid #ddd;border-radius:8px;font-size:1rem;">
                        </div>

                        <h3 style="margin-top:16px;">Payment Method</h3>
                        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(180px,1fr));gap:12px;">
                            @foreach($paymentMethods as $pm)
                                <label
                                    style="border:2px solid #ddd;border-radius:12px;padding:16px;cursor:pointer;text-align:center;transition:all .2s;"
                                    class="payment-method-card">
                                    <input type="radio" name="payment_method" value="{{ $pm['code'] ?? '' }}"
                                        style="display:none;"
                                        onchange="this.closest('label').style.borderColor='var(--primary)'">
                                    @if(!empty($pm['banner']))
                                        <img src="{{ $pm['banner'] }}" alt="{{ $pm['title_en'] ?? '' }}"
                                            style="max-height:40px;margin-bottom:8px;">
                                    @endif
                                    <div style="font-weight:600;">{{ $pm['title_en'] ?? $pm['title_ar'] ?? '' }}</div>
                                </label>
                            @endforeach
                        </div>

                        <h3 style="margin-top:16px;">Coupon Code</h3>
                        <div style="display:flex;gap:10px;">
                            <input type="text" id="co-coupon" placeholder="Enter coupon code"
                                style="flex:1;padding:12px;border:1px solid #ddd;border-radius:8px;">
                            <button type="button" onclick="checkCoupon()" class="btn btn-primary"
                                style="padding:12px 24px;">Apply</button>
                        </div>
                        <div id="coupon-result" style="display:none;padding:12px;border-radius:8px;margin-top:8px;"></div>

                        <button type="submit" class="btn btn-primary"
                            style="padding:16px;font-size:1.1rem;width:100%;margin-top:20px;">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            async function loadStates(countryId) {
                if (!countryId) return;
                const res = await fetch('/api/states/' + countryId);
                const data = await res.json();
                const sel = document.getElementById('co-state');
                sel.innerHTML = '<option value="">Select State</option>';
                (data || []).forEach(s => {
                    sel.innerHTML += `<option value="${s.id}">${s.name_en || s.name_ar || ''}</option>`;
                });
            }
            async function loadCities(stateId) {
                if (!stateId) return;
                const res = await fetch('/api/cities/' + stateId);
                const data = await res.json();
                const sel = document.getElementById('co-city');
                sel.innerHTML = '<option value="">Select City</option>';
                (data || []).forEach(c => {
                    sel.innerHTML += `<option value="${c.id}">${c.name_en || c.name_ar || ''}</option>`;
                });
            }
            async function checkCoupon() {
                const code = document.getElementById('co-coupon').value;
                if (!code) return;
                const res = await fetch('/check-coupon', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    body: JSON.stringify({ coupon_code: code, items: [] })
                });
                const data = await res.json();
                const el = document.getElementById('coupon-result');
                el.style.display = 'block';
                if (data && data.code == 200) {
                    el.style.background = '#d1fae5'; el.style.color = '#065f46';
                    el.innerHTML = `Coupon applied! Discount: ${data.data?.discount || 0}`;
                } else {
                    el.style.background = '#fee2e2'; el.style.color = '#991b1b';
                    el.innerHTML = data?.message || 'Invalid coupon code';
                }
            }
            document.getElementById('checkout-form')?.addEventListener('submit', async (e) => {
                e.preventDefault();
                const pm = document.querySelector('input[name="payment_method"]:checked');
                if (!pm) { alert('Please select a payment method'); return; }
                const body = {
                    first_name: document.getElementById('co-first-name').value,
                    last_name: document.getElementById('co-last-name').value,
                    email: document.getElementById('co-email').value,
                    phone: document.getElementById('co-phone').value,
                    country_id: document.getElementById('co-country').value,
                    state_id: document.getElementById('co-state').value,
                    city_id: document.getElementById('co-city').value,
                    address: document.getElementById('co-address').value,
                    payment_method_code: pm.value,
                    coupon_code: document.getElementById('co-coupon').value,
                    items: []
                };
                const res = await fetch('/checkout', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    body: JSON.stringify(body)
                });
                const data = await res.json();
                if (data && data.code == 201 && data.data?.payment_url) {
                    window.location.href = data.data.payment_url;
                } else {
                    alert(data?.message || 'Checkout failed. Please try again.');
                }
            });
        </script>
    @endpush
@endsection