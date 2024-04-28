import { Typography, Box, useTheme } from "@mui/material";

const ItemNameAndPrice = ({ itemName, price }) => {
    const theme = useTheme();

    return (
        <Box>
            <Typography
                variant="secondaryTitle"
                className="item-name"
                fontWeight="700"
                display="block"
                color={theme.palette.text.grey[500]}
                fontSize="1.75rem"
            >
                {itemName}
            </Typography>
            <Typography
                variant="title"
                className="item-price"
                fontWeight="500"
                display="block"
                color={theme.palette.text.grey[500]}
            >
                ${price.toFixed(2)}
            </Typography>
        </Box>
    );
};

export default ItemNameAndPrice;
