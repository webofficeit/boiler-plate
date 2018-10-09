<?php

namespace App\Models\Backend\Traits\Attribute;

/**
 * Trait RoleAttribute.
 */
trait CategoryAttribute
{
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        
        return '<a href="'.route('admin.category.edit', \Crypt::encryptString($this->id)).'" class="btn btn-primary"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.category.destroy', $this).'"
			 data-method="delete"
			 data-trans-button-cancel="'.__('buttons.general.cancel').'"
			 data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
			 data-trans-title="'.__('strings.backend.general.are_you_sure').'"
			 class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        if ($this->id == 1) {
            return 'N/A';
        }

        return '<div class="btn-group btn-group-sm" role="group" aria-label="'.__('labels.backend.access.users.user_actions').'">
			  '.$this->edit_button.'
			  '.$this->delete_button.'
			</div>';
    }
    
    /**
     * @return mixed
     */
    public function getPictureAttribute()
    {
       if($this->avathar!='')
        return $this->avathar;
       return null;
    }
}
