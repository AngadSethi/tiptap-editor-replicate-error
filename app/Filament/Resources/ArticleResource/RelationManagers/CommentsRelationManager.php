<?php

namespace App\Filament\Resources\ArticleResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'comments';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TiptapEditor::make('content')->required()->columnSpanFull()->default("<pre><code>**Solution**

The correct answer is **Option B) ₹72 Lakhs.**

First, let&#039;s determine the total sales for each broker:
- **Broker A**: Each house sells for ₹24,00,000. Selling 50 houses, total sales are:
  $$
  24,00,000 \times 50 = ₹12\text{ crores}
  $$
- **Broker B**: Each house sells for ₹20,00,000. Selling 45 houses, total sales are:
  $$
  20,00,000 \times 45 = ₹9\text{ crores}
  $$

Next, we calculate their earnings based on their commission rates:
- **Broker A**: Receives a 3% commission. His earnings are:
  $$
  \frac{3}{100} \times 120000000 = ₹36,00,000
  $$
- **Broker B**: Receives a 4% commission. His earnings are:
  $$
  \frac{4}{100} \times 90000000 = ₹36,00,000
  $$

**Total earnings for both brokers combined**:
$$
₹36,00,000 + ₹36,00,000 = ₹72,00,000 \text{ or ₹72 Lakhs.}
$$
</code></pre></code></pre>")
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('id'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
