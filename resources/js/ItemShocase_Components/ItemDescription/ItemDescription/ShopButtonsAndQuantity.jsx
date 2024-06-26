import { Button, Typography, Box, useTheme } from "@mui/material";
import { useForm } from "@inertiajs/react";
import { useEffect } from "react";

const ShopButtonsAndQuantity = ({
    color,
    sizeIndex,
    itemType,
    itemID,
    stock,
}) => {
    const theme = useTheme();
    const { data, setData, post, errors } = useForm({
        itemID: itemID,
        color: color,
        sizeIndex: sizeIndex,
    });

    useEffect(() => {
        setData("sizeIndex", sizeIndex);
    }, [sizeIndex]);

    const stockText =
        stock <= 10 &&
        (stock == 0 ? "Out of Stock" : `Only ${stock} Left in Stock`);

    return (
        <Box className="shop-buttons" mt={3}>
            <Typography
                variant="itemdescSubtitle"
                display="block"
                color={theme.palette.text.grey[500]}
                fontWeight="700"
                my={1}
            >
                {stockText}
            </Typography>
            {itemType !== "PreordereItem" && (
                <Button
                    sx={{
                        my: 1,
                        py: 1.25,
                        fontSize: "0.9rem",
                        textTransform: "uppercase",
                        opacity: stock == 0 && "0.5",
                        width: { xs: "100%", lg: "80%" },
                        color: theme.palette.primary.main,
                        pointerEvents: stock == 0 && "none",
                        border: `1px solid ${theme.palette.primary.main}`,
                        "&:hover": {
                            backgroundColor: theme.palette.text.grey[700],
                            color: theme.palette.text.white[500],
                        },
                    }}
                    onClick={() => post(route("addtocart"))}
                >
                    {itemType === "PreordereItem"
                        ? "Pre Order Now"
                        : "Add to cart"}
                </Button>
            )}
            {/* <Button
                sx={{
                    mb: 3,
                    my: 1,
                    py: 1.75,
                    fontSize: "0.9rem",
                    textTransform: "uppercase",
                    opacity: stock == 0 && "0.5",
                    width: { xs: "100%", lg: "80%" },
                    color: theme.palette.text.white[500],
                    pointerEvents: stock == 0 && "none",
                    backgroundColor: theme.palette.primary.main,
                    "&:hover": {
                        backgroundColor: theme.palette.text.grey[700],
                    },
                }}
            >
                {itemType === "PreordereItem" ? "Pre Order Now" : "Buy Now"}
            </Button> */}
            {/* <Box mb={2}>
                <Box display="flex" alignItems="center">
                    <img
                        src="./assets/Curated.png"
                        style={{ height: "18px" }}
                    />
                    <Typography
                        variant="itemdescTitle"
                        textTransform="initial"
                        color={theme.palette.text.grey[600]}
                        my={1}
                        ml={1}
                    >
                        Curated with Care
                    </Typography>
                </Box>
                <Typography
                    variant="itemdescSubtitle"
                    display="block"
                    textTransform="initial"
                    fontSize="1rem"
                    color={theme.palette.text.grey[600]}
                >
                    Handpicked kids items featuring captivating designs, perfect
                    for loved ones.
                </Typography>
            </Box>
            <Box mb={2}>
                <Box display="flex" alignItems="center">
                    <img
                        src="./assets/Decured Transaction.png"
                        style={{ height: "18px" }}
                    />
                    <Typography
                        variant="itemdescTitle"
                        textTransform="initial"
                        color={theme.palette.text.grey[600]}
                        my={1}
                        ml={1}
                    >
                        Effortless Solutions
                    </Typography>
                </Box>
                <Typography
                    variant="itemdescSubtitle"
                    display="block"
                    textTransform="initial"
                    fontSize="1rem"
                    color={theme.palette.text.grey[600]}
                >
                    Hasslefree shopping experience with fast delivery, because
                    your convenience matters to us!
                </Typography>
            </Box>
            <Box mb={2}>
                <Box display="flex" alignItems="center">
                    <img
                        src="./assets/Effortless.png"
                        style={{ height: "18px" }}
                    />
                    <Typography
                        variant="itemdescTitle"
                        textTransform="initial"
                        color={theme.palette.text.grey[600]}
                        my={1}
                        ml={1}
                    >
                        Trustworthy Transactions
                    </Typography>
                </Box>
                <Typography
                    variant="itemdescSubtitle"
                    display="block"
                    textTransform="initial"
                    fontSize="1rem"
                    color={theme.palette.text.grey[600]}
                >
                    Registered Saskatchewan business, we guarantee secure
                    payments for your peace of mind. Shop Our Must-Have Picks!
                </Typography>
            </Box> */}
        </Box>
    );
};

export default ShopButtonsAndQuantity;
