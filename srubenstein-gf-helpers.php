<?php
namespace sethrubenstein;
class gfHelpers {
	// Let's say you want to get a simple array of the answers from a "Survey" likert type entry that has values. This will return an array of answers, very simple. 
	public function getSurveyAnswersArray( $entry, $form ) {
        $answers = array();

        $gfSurveys = new \GFSurvey();
        $survey_fields = \GFCommon::get_fields_by_type( $form, array( 'survey' ) );
        foreach ( $survey_fields as $field ) {
            $type = \GFFormsModel::get_input_type( $field );
            if ( 'likert' == $type && rgar( $field, 'gsurveyLikertEnableScoring' ) ) {
                array_push( $answers, $gfSurveys->get_field_score( $field, $entry ) );
            }
        }

        return $answers;
    }

}
